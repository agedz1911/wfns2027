<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WFNS 2027 – Programme</title>
<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<style>[x-cloak]{display:none!important}</style>
</head>
<body class="bg-slate-100 text-slate-800" x-data="schedule()" x-cloak>

<header class="bg-gradient-to-r from-indigo-700 to-sky-600 text-white">
  <div class="max-w-[1600px] mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold">WFNS 2027 – Scientific Programme</h1>
    <p class="text-indigo-100 text-sm">Demo UI: Tailwind + Alpine (di Laravel = Blade + Livewire)</p>
  </div>
</header>

<main class="max-w-[1600px] mx-auto px-4 py-4 space-y-4">

  <!-- Day tabs -->
  <div class="flex gap-2 overflow-x-auto pb-1">
    <template x-for="(d,i) in days" :key="i">
      <button @click="day=i"
        :class="day===i ? 'bg-indigo-600 text-white shadow' : 'bg-white text-slate-600 hover:bg-indigo-50'"
        class="shrink-0 rounded-xl px-4 py-2 text-left transition">
        <div class="text-xs opacity-80" x-text="d.kind"></div>
        <div class="font-semibold" x-text="d.label"></div>
        <div class="text-xs opacity-80" x-text="d.date"></div>
      </button>
    </template>
  </div>

  <!-- Toolbar -->
  <div class="bg-white rounded-xl shadow-sm p-3 flex flex-wrap gap-3 items-center">
    <input x-model="q" type="search" placeholder="Cari sesi / topik…"
      class="flex-1 min-w-[200px] rounded-lg border border-slate-300 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-400 outline-none">
    <select x-model="room" class="rounded-lg border border-slate-300 px-3 py-2 text-sm">
      <option value="">Semua room</option>
      <template x-for="n in 17"><option :value="n" x-text="'Room '+n"></option></template>
    </select>
    <select x-model="topic" class="rounded-lg border border-slate-300 px-3 py-2 text-sm">
      <option value="">Semua topik</option>
      <template x-for="t in topics"><option :value="t" x-text="t"></option></template>
    </select>
    <div class="inline-flex rounded-lg border border-slate-300 overflow-hidden text-sm">
      <button @click="view='grid'" :class="view==='grid'?'bg-indigo-600 text-white':'bg-white'" class="px-3 py-2">Grid</button>
      <button @click="view='list'" :class="view==='list'?'bg-indigo-600 text-white':'bg-white'" class="px-3 py-2">List</button>
    </div>
    <button @click="q='';room='';topic='';onlyFav=false" class="text-sm text-indigo-600 hover:underline">Reset</button>
    <label class="flex items-center gap-1 text-sm"><input type="checkbox" x-model="onlyFav"> ★ My Schedule (<span x-text="favs.length"></span>)</label>
  </div>

  <!-- GRID VIEW -->
  <section x-show="view==='grid'" class="bg-white rounded-xl shadow-sm overflow-auto max-h-[75vh]">
    <div class="grid min-w-max text-xs"
         style="grid-template-columns: 96px repeat(17, 150px);">
      <!-- header -->
      <div class="sticky top-0 left-0 z-30 bg-slate-800 text-white font-semibold p-2 flex items-center">TIME</div>
      <template x-for="n in 17">
        <div class="sticky top-0 z-20 bg-slate-800 text-white font-semibold p-2 text-center border-l border-slate-700" x-text="'ROOM '+n"></div>
      </template>

      <template x-for="(slot,si) in days[day].slots" :key="day+'-'+si">
        <template x-for="cell in [{time:slot.time}].concat(slot.items)">
          <div :class="cell.time ? 'sticky left-0 z-10 bg-slate-50 font-semibold text-slate-600 border-t border-slate-200 p-2 flex items-center' : ''"
               :style="cell.time ? 'grid-column:1' : `grid-column:${cell.from+1} / span ${cell.to-cell.from+1}`"
               class="min-h-[84px]">
            <template x-if="cell.time"><span x-text="cell.time"></span></template>
            <template x-if="!cell.time">
              <button @click="open=cell; openTime=slot.time" :class="[color(cell), match(cell)?'':'opacity-20']"
                class="relative w-full h-full text-left rounded-lg border p-2 m-0 hover:ring-2 hover:ring-indigo-400 transition">
                <span @click.stop="toggleFav(day+slot.time+cell.from)" class="absolute top-1 right-1 cursor-pointer"
                  x-text="favs.includes(day+slot.time+cell.from)?'★':'☆'"></span>
                <div class="font-semibold leading-tight pr-4" x-text="cell.title"></div>
                <div class="mt-1 opacity-70" x-text="cell.sub||''"></div>
              </button>
            </template>
          </div>
        </template>
      </template>
    </div>
  </section>

  <!-- LIST VIEW (mobile-friendly) -->
  <section x-show="view==='list'" class="space-y-4">
    <template x-for="slot in days[day].slots" :key="slot.time">
      <div x-show="slot.items.some(i=>match(i))">
        <h3 class="sticky top-0 bg-slate-100 py-1 font-semibold text-indigo-700" x-text="slot.time"></h3>
        <div class="grid gap-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
          <template x-for="cell in slot.items.filter(i=>match(i))">
            <div :class="color(cell)" @click="open=cell; openTime=slot.time" class="rounded-lg border p-3 cursor-pointer hover:shadow">
              <div class="flex justify-between text-[11px] font-semibold uppercase opacity-70">
                <span x-text="cell.from===cell.to ? 'Room '+cell.from : (cell.to-cell.from>=16 ? 'All rooms' : 'Rooms '+cell.from+'–'+cell.to)"></span>
                <span @click.stop="toggleFav(day+slot.time+cell.from)" class="cursor-pointer text-base leading-none"
                  x-text="favs.includes(day+slot.time+cell.from)?'★':'☆'"></span>
              </div>
              <div class="font-semibold" x-text="cell.title"></div>
              <div class="text-xs opacity-70" x-text="cell.sub||''"></div>
            </div>
          </template>
        </div>
      </div>
    </template>
  </section>

</main>

<!-- Detail modal -->
<div x-show="open" @keydown.escape.window="open=null" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4" @click.self="open=null">
  <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6 space-y-3" x-show="open">
    <div class="flex justify-between">
      <span class="text-xs font-semibold uppercase text-indigo-600" x-text="open && types[open.type||'parallel'].name"></span>
      <button @click="open=null" class="text-slate-400 hover:text-slate-700">✕</button>
    </div>
    <h2 class="text-xl font-bold" x-text="open?.title"></h2>
    <p class="text-slate-500 text-sm" x-text="open?.sub"></p>
    <dl class="text-sm grid grid-cols-3 gap-y-1">
      <dt class="text-slate-500">Hari</dt><dd class="col-span-2" x-text="days[day].label+' – '+days[day].date"></dd>
      <dt class="text-slate-500">Waktu</dt><dd class="col-span-2" x-text="openTime"></dd>
      <dt class="text-slate-500">Room</dt>
      <dd class="col-span-2" x-text="open && (open.from===open.to ? 'Room '+open.from : 'Room '+open.from+' – '+open.to)"></dd>
    </dl>
    <p class="text-xs text-slate-400">Nanti di Livewire: daftar speaker, abstrak, tombol "Add to calendar (.ics)".</p>
  </div>
</div>

<script>
function schedule() {
  const P = 'parallel';
  // helper: satu sesi per room (room 1..17)
  const row = (time, names) => ({ time, items: names.map((t,i)=>({from:i+1,to:i+1,title:'Room '+(i+1),sub:t,type:P,topic:t})) });
  const all  = (time, title, type) => ({ time, items:[{from:1,to:17,title,type}] });
  const plen = (time, a, b, c, type='plenary', pre='PLENARY') => ({ time, items:[
    {from:1,to:6, title:pre+' A', sub:a, type, topic:a},
    {from:7,to:12,title:pre+' B', sub:b, type, topic:b},
    {from:13,to:17,title:pre+' C',sub:c, type, topic:c}]});
  const lunch = (time) => plen(time,'Lunch Symposium','Lunch Symposium','Lunch Symposium','lunch','(PRE) LUNCH SYMPOSIUM');

  const d1am = ['Open Vascular','Endo Vascular','Skull-Base','Neuro-Oncology','Spine','Materials, Drugs and Devices','Pediatric Neurosurgery','Neurotraumatology','Global Neurosurgery','Innovation in Neurosurgery','Young Neurosurgeons','3D Neuroanatomy','Controversies in Neurosurgery','Stereotactic and Functional','Video Presentation','Complication in Neurosurgery','Case Based Discussion'];
  const d1pm1 = [...d1am]; d1pm1[0]='Neuroanatomy'; d1pm1[5]='Peripheral Nerve'; d1pm1[9]='Research and Publishing';
  const d1pm2 = [...d1pm1]; d1pm2[0]='Open Vascular'; d1pm2[6]='Neuroplastic Surgery'; d1pm2[13]='Hydrocephalus and CSF';

  const d2am = ['Young Neurosurgeons','Research and Publishing','Stereotactic and Functional','Neuro-Oncology','Women in Neurosurgery','AI in Neurosurgery','Skull-Base','Spine','Global Neurosurgery','Cranio-cervical Junction','Education and Training','3D Neuroanatomy','Controversies in Neurosurgery','Neuroendoscopy','Video Presentation','Complication in Neurosurgery','Case Based Discussion'];
  const d2pm1 = [...d2am]; Object.assign(d2pm1,{0:'Radiosurgery',1:'Open Vascular',4:'Hydrocephalus and CSF',6:'Neuroanatomy',10:'Skull-Base'});
  const d2pm2 = [...d2pm1]; Object.assign(d2pm2,{4:'Radiosurgery',5:'Young Neurosurgeons',6:'Ambassador'});

  const d3am = ['Open Vascular','Endo Vascular','Skull-Base','Neuro-Oncology','Spine','Young Neurosurgeons','Hydrocephalus and CSF','Neurotraumatology','Global Neurosurgery','Research and Publishing','Young Neurosurgeons','3D Neuroanatomy','Controversies in Neurosurgery','Epilepsy Surgery','Video Presentation','Complication in Neurosurgery','Case Based Discussion'];
  const d3pm1 = [...d3am]; Object.assign(d3pm1,{6:'Pediatric Neurosurgery',8:'Neuroanatomy'});
  const d3pm2 = [...d3pm1]; Object.assign(d3pm2,{0:'Radiosurgery',1:'Endo Vascular',2:'Stereotactic and Functional',4:'Women in Neurosurgery',5:'Innovation in Neurosurgery',6:'Skull-Base',8:'Global Neurosurgery',9:'Cranio-cervical Junction',10:'Ethno Racial',13:'Neuroendoscopy'});

  const wsDay1 = ['Live Surgery: Vascular','Live Surgery: Skull-Base','Live Surgery: Spine','Live Surgery: Functional','Hydrocephalus Workshop','NeuroTrauma Workshop (ICP)','PNNLS','Innovation in Neurosurgery','Advance Pain Interventional','IntraOperative Ultrasound','Ambassador','Cranio-cervical Junction','Education & Training','Epilepsy Surgery','Global Neurosurgery','Liaison Committee WFNS/WHO','Neuroanatomy'];
  const wsDay2 = ['Cadaveric: Skull Base','Dry Workshop: Vascular','Workshop: Spine','Cadaveric: Epilepsy','Demo: Fiber Dissection','Basic Skull Base Course','Craniosynostosis Course','AI in Neurosurgery Project','Resource Stratified Guidelines','World Neurosurgery Registry','Neuroendoscopy','Stereotactic & Neuromodulation','Neuro-Oncology','Research','Spine and Neuro-rehabilitation','Young Neurosurgeons (YNS)','Normo Pressure Hydrocephalus'];
  const wsFull = (time, names) => row(time, names);

  const sympoDay = (label,date,a,b,c,keynote,key2,last,mid) => ({kind:'Symposium',label,date,slots:[
    row('07:30 – 08:30',a), all('08:30 – 10:00',keynote,'keynote'), all('10:00 – 10:30','COFFEE BREAK','break'),
    plen('10:30 – 12:00',...mid), lunch('12:00 – 13:00'), all('13:00 – 14:00','LUNCH BREAK','break'),
    row('14:00 – 15:00',b), row('15:00 – 16:00',c), all('16:00 – 16:30','COFFEE BREAK','break'), all('16:30 – 18:30','FREE PAPER PRESENTATIONS','free')]});

  return {
    q:'', room:'', topic:'', view: window.innerWidth<768?'list':'grid', day:2, open:null, openTime:'', onlyFav:false,
    favs: [],
    types: {
      parallel:{name:'Parallel session', cls:'bg-sky-50 border-sky-200 text-sky-900'},
      plenary:{name:'Plenary', cls:'bg-indigo-100 border-indigo-300 text-indigo-900'},
      keynote:{name:'Keynote / Ceremony', cls:'bg-amber-100 border-amber-300 text-amber-900'},
      lunch:{name:'Lunch symposium', cls:'bg-emerald-100 border-emerald-300 text-emerald-900'},
      free:{name:'Free paper', cls:'bg-fuchsia-100 border-fuchsia-300 text-fuchsia-900'},
      break:{name:'Break', cls:'bg-slate-200 border-slate-300 text-slate-600'},
      workshop:{name:'Workshop', cls:'bg-rose-50 border-rose-200 text-rose-900'},
    },
    days: [
      {kind:'Pre-Congress', label:'Workshop Day 1', date:'Tue, 16 Nov', slots:[ {time:'08:00 – 16:00', items: wsDay1.map((t,i)=>({from:i+1,to:i+1,title:'Room '+(i+1),sub:t,type:'workshop',topic:t})) } ]},
      {kind:'Pre-Congress', label:'Workshop Day 2', date:'Wed, 17 Nov', slots:[ {time:'08:00 – 16:00', items: wsDay2.map((t,i)=>({from:i+1,to:i+1,title:'Room '+(i+1),sub:t,type:'workshop',topic:t})) }, all('16:00 – 17:00','OPENING CEREMONY & WELCOME','keynote') ]},
      sympoDay('Symposium Day 1','Thu, 18 Nov',d1am,d1pm1,d1pm2,'OPENING · KEYNOTE SESSION 1',null,null,['Skull-Base','Vascular','Pediatric Neurosurgery']),
      sympoDay('Symposium Day 2','Fri, 19 Nov',d2am,d2pm1,d2pm2,'KEYNOTE SESSION 2',null,null,['Neurotraumatology','Epilepsy Surgery','Spine']),
      (()=>{ const d=sympoDay('Symposium Day 3','Sat, 20 Nov',d3am,d3pm1,d3pm2,'',null,null,['Stereotactic','Global Neurosurgery','Neuro-Oncology']);
        d.slots=[row('07:30 – 09:00',d3am), all('09:00 – 09:45','FREE PAPER PRESENTATIONS','free'), all('09:45 – 10:30','COFFEE BREAK','break'),
          plen('10:30 – 12:00','Stereotactic','Global Neurosurgery','Neuro-Oncology'), lunch('12:00 – 13:45'),
          row('13:45 – 14:45',d3pm1), row('14:45 – 15:45',d3pm2), all('15:45 – 16:15','CLOSING CEREMONY','keynote')]; return d; })()
    ],
    get topics(){ return [...new Set(this.days.flatMap(d=>d.slots.flatMap(s=>s.items.map(i=>i.topic)).filter(Boolean)))].sort(); },
    color(c){ return this.types[c.type||'parallel'].cls; },
    match(c){
      if (this.onlyFav && !this.favs.some(f=>f.startsWith(this.day) && f.endsWith(String(c.from)) && this.days[this.day].slots.some(s=>s.items.includes(c) && f===this.day+s.time+c.from))) return false;
      if (this.room && !(c.from<=this.room && this.room<=c.to)) return false;
      if (this.topic && c.topic!==this.topic) return false;
      if (this.q && !((c.title+' '+(c.sub||'')).toLowerCase().includes(this.q.toLowerCase()))) return false;
      return true;
    },
    toggleFav(k){ this.favs = this.favs.includes(k) ? this.favs.filter(x=>x!==k) : [...this.favs,k]; },
  }
}
</script>
</body>
</html>
