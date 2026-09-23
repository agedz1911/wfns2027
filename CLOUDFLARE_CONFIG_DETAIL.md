# 🔧 Cloudflare Configuration untuk Performance

## Cloudflare Settings yang WAJIB untuk Website Ini

---

## 1️⃣ SPEED SETTINGS

### Location: Speed → Optimization

#### Compression
```
✓ Brotli - ON
✓ Auto Minify:
  - Minify CSS: ON
  - Minify JS: ON  
  - Minify HTML: ON
✓ Polish: Lossy (or Lossless jika ingin quality lebih baik)
✓ Lazy Loading: ON
✓ Early Hints: ON (jika tersedia)
✓ Prefetch Preload: ON
```

#### Mobile Optimization
```
✓ Polish Mobile: Enabled
```

---

## 2️⃣ CACHING SETTINGS

### Location: Caching → Configuration

#### Browser Cache TTL
```
Default: 30 minutes → CHANGE TO: 4 hours (14400 seconds)
```

#### Cache Level
```
Standard → CHANGE TO: Cache Everything
```

#### Cache Key
```
Include Query String: OFF (jika website tidak pakai query string)
```

---

## 3️⃣ RULES & ROUTING

### Location: Rules → Page Rules

#### Rule 1: Cache Everything
```
URL: example.com/*
Actions:
  ✓ Cache Level: Cache Everything
  ✓ Browser Cache TTL: 1 day
  ✓ Cache on Cookie: (kosongkan)
  ✓ Rocket Loader: OFF
```

#### Rule 2: HTML Files
```
URL: example.com/*.html
Actions:
  ✓ Cache Level: Cache Everything
  ✓ Browser Cache TTL: 2 hours
```

---

## 4️⃣ PERFORMANCE SETTINGS

### Location: Speed → Optimization

#### Rocket Loader
```
Status: OFF (Hindari untuk Livewire/JavaScript interaktif)
```

Catatan: Rocket Loader bisa merusak JavaScript functionality di website yang 
menggunakan Livewire atau JavaScript interaktif.

#### HTTP/2 Push
```
Aktifkan jika Cloudflare support
```

#### HTTPS/SSL
```
Go to SSL/TLS → Overview
Minimum TLS Version: 1.2
Recommended: 1.3
```

---

## 5️⃣ ANALYTICS & MONITORING

### Location: Analytics & Logs

#### Enable
```
✓ Web Analytics: Enabled
✓ Bot Management: Basic (Free tier)
```

Monitor metrics:
- Page Views
- Requests
- Cache Hit Ratio (target: > 60%)
- Origin Response Time

---

## 6️⃣ PURGE CACHE (Jika Update)

Setiap kali ada update website:

### Option A: Full Purge
```
Dashboard → Caching → Purge Everything
```

### Option B: Selective Purge
```
Caching → Purge by URL
Masukkan URL tertentu yang ingin di-purge
```

### Option C: API Purge
```bash
curl -X POST "https://api.cloudflare.com/client/v4/zones/{ZONE_ID}/purge_cache" \
  -H "X-Auth-Email: YOUR_EMAIL" \
  -H "X-Auth-Key: YOUR_API_KEY" \
  -H "Content-Type: application/json" \
  -d '{"purge_everything":true}'
```

---

## 7️⃣ ADVANCED OPTIMIZATION (OPTIONAL)

### SXG (Signed Exchanges)
```
Location: Speed → Optimization → Signed Exchanges
Enable untuk better AMP performance (jika relevant)
```

### Prefetch Preload
```
Location: Speed → Optimization → Prefetch Preload
Status: ON
```

### TCP Optimization
```
Location: Network → Network Optimization
- BBR: Enabled (faster TCP)
- IP Geolocation: Enabled (untuk country-specific content)
```

---

## 8️⃣ MONITORING DASHBOARD

### Wajib Check Setiap Hari:

**URL:** https://dash.cloudflare.com

Monitor:
1. **Cache Hit Ratio** - Harus > 50%
2. **Origin Response Time** - Harus < 200ms
3. **Errors & Status Codes** - Harus minim
4. **Bandwidth Usage** - For billing

### Ideal Metrics:
```
Cache Hit Ratio: 70-90%
Origin Response Time: 50-150ms
Error Rate: < 1%
Page Load Time: < 2s
```

---

## ✅ CHECKLIST KONFIGURASI FINAL

- [ ] Brotli compression: ON
- [ ] Auto Minify (CSS, JS, HTML): ON
- [ ] Polish: Lossy
- [ ] Lazy Loading: ON
- [ ] Browser Cache TTL: 4 hours
- [ ] Cache Level: Cache Everything
- [ ] Rocket Loader: OFF
- [ ] SSL/TLS: 1.2 or 1.3
- [ ] Page Rules: Cache Everything
- [ ] Analytics: Enabled
- [ ] Monitor Cache Hit Ratio weekly

---

## 🆘 TROUBLESHOOTING

### Cache Ratio Rendah (< 30%)?
```
1. Check Cache Level setting (should be "Cache Everything")
2. Check if site uses cookies (might prevent caching)
3. Check Page Rules - make sure cache is enabled
4. Try purging cache dan reset
```

### Website Masih Lambat Setelah Optimization?
```
1. Compress images FIRST (paling penting)
2. Check origin server response time
3. Check DNS resolution time
4. Consider upgrading to Workers/Argo Tunnel
```

### JavaScript Tidak Bekerja dengan Baik?
```
1. Check if Rocket Loader is ON → Turn OFF
2. Check browser console untuk error
3. Check if using async/defer attributes pada script tags
```

---

## 📞 SUPPORT

- Cloudflare Docs: https://developers.cloudflare.com
- Status Page: https://www.cloudflarestatus.com
- Community: https://community.cloudflare.com
