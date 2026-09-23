#!/usr/bin/env python3
\"\"\"
Image Optimization Script for WFNS 2027 Website
Compresses all PNG/JPG images in the public/assets/images folder
\"\"\"

from PIL import Image
import os
import sys

def optimize_images(folder_path):
    \"\"\"Optimize all images in the given folder\"\"\"
    
    if not os.path.exists(folder_path):
        print(f\"❌ Folder tidak ditemukan: {folder_path}\")
        return
    
    supported_formats = ('.png', '.jpg', '.jpeg')
    total_saved = 0
    processed = 0
    
    print(\"🔄 Mulai optimasi gambar...\")
    print(f\"📁 Folder: {folder_path}\\n\")
    
    for filename in os.listdir(folder_path):
        if filename.lower().endswith(supported_formats):
            filepath = os.path.join(folder_path, filename)
            
            # Get original size
            original_size = os.path.getsize(filepath) / 1024  # KB
            
            try:
                # Open and optimize image
                img = Image.open(filepath)
                
                # Convert RGBA to RGB if necessary for JPG
                if img.mode == 'RGBA' and filename.lower().endswith('.jpg'):
                    img = img.convert('RGB')
                
                # Save with optimization
                img.save(filepath, optimize=True, quality=85)
                
                # Get new size
                new_size = os.path.getsize(filepath) / 1024  # KB
                reduction = ((original_size - new_size) / original_size) * 100
                
                print(f\"✅ {filename}\")
                print(f\"   Sebelum: {original_size:.2f} KB → Sesudah: {new_size:.2f} KB\")
                print(f\"   Pengurangan: {reduction:.1f}% 📉\\n\")
                
                total_saved += (original_size - new_size)
                processed += 1
                
            except Exception as e:
                print(f\"❌ Error processing {filename}: {str(e)}\\n\")
    
    print(\"=\"*50)
    print(f\"✨ Optimasi Selesai!\")
    print(f\"   - Files diproses: {processed}\")
    print(f\"   - Total ukuran berkurang: {total_saved:.2f} KB\")
    print(\"=\"*50)


def convert_to_webp(folder_path):
    \"\"\"Convert PNG/JPG to WebP format (OPTIONAL)\"\"\"
    
    print(\"\\n🔄 Convert ke WebP format (ini OPTIONAL, lewati jika ingin PNG)\")
    response = input(\"Lanjutkan convert ke WebP? (y/n): \").lower()
    
    if response != 'y':
        print(\"⏭️  Skip WebP conversion\\n\")
        return
    
    supported_formats = ('.png', '.jpg', '.jpeg')
    
    for filename in os.listdir(folder_path):
        if filename.lower().endswith(supported_formats):
            filepath = os.path.join(folder_path, filename)
            webp_filepath = filepath.rsplit('.', 1)[0] + '.webp'
            
            try:
                img = Image.open(filepath)
                if img.mode == 'RGBA':
                    img = img.convert('RGB')
                
                img.save(webp_filepath, 'WEBP', quality=85)
                
                original_size = os.path.getsize(filepath) / 1024
                webp_size = os.path.getsize(webp_filepath) / 1024
                reduction = ((original_size - webp_size) / original_size) * 100
                
                print(f\"✅ {filename} → {os.path.basename(webp_filepath)}\")
                print(f\"   Size: {original_size:.2f} KB → {webp_size:.2f} KB ({reduction:.1f}% smaller)\\n\")
                
            except Exception as e:
                print(f\"❌ Error converting {filename}: {str(e)}\\n\")


if __name__ == \"__main__\":
    # Folder path
    folder = r\"public\\assets\\images\"
    
    print(\"\\n\" + \"=\"*50)
    print(\"🎯 WFNS 2027 Image Optimization Tool\")
    print(\"=\"*50 + \"\\n\")
    
    # Optimize PNG/JPG
    optimize_images(folder)
    
    # Optional: Convert to WebP
    convert_to_webp(folder)
    
    print(\"\\n✨ Done! Reload website untuk melihat hasilnya.\")
    print(\"📊 Test di: https://pagespeed.web.dev\\n\")
