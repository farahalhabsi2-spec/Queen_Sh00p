import requests
from bs4 import BeautifulSoup
import json

# رابط الموقع
url = "https://toqueen.com"

response = requests.get(url)
soup = BeautifulSoup(response.text, "html.parser")

products = []

# مثال: ناخذ أول 10 منتجات
for item in soup.select(".product-item")[:10]:
    name = item.select_one(".product-title").get_text(strip=True) if item.select_one(".product-title") else "بدون اسم"
    price = item.select_one(".price").get_text(strip=True) if item.select_one(".price") else "غير متوفر"
    img = item.select_one("img")["src"] if item.select_one("img") else ""

    products.append({
        "name": name,
        "price": price,
        "image": img,
        "category": "makeup"
    })

# حفظ النتائج داخل ملف products.json
with open("products.json", "w", encoding="utf-8") as f:
    json.dump(products, f, ensure_ascii=False, indent=4)

print("✅ تم إنشاء ملف products.json")
