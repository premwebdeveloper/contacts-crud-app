# 📇 Contacts CRUD Application (Laravel)

This is a simple **Laravel CRUD application** for managing contacts.  
It also supports **bulk importing contacts** from an XML file.  

---

## 🚀 Features
- Add, edit, update, and delete contacts
- Bulk import contacts from an XML file
- Validation for duplicate phone numbers
- MySQL database integration
- RESTful resource controller
- Clean and simple UI

---

## 🛠 Tech Stack
- **Backend:** PHP (Laravel Framework)
- **Database:** MySQL
- **Frontend:** Blade templates, Bootstrap
- **Version Control:** Git & GitHub

---

## 📂 Project Setup

### 1️⃣ Clone the repository
```bash
git clone https://github.com/premwebdeveloper/contacts-crud-app.git
cd contacts-crud-app
```

### 2️⃣ Install dependencies
```bash
composer install
```

### 3️⃣ Create `.env` file
```bash
cp .env.example .env
```
Update database credentials in `.env`:
```env
DB_DATABASE=contacts_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Run migrations
```bash
php artisan migrate
```

### 5️⃣ Start local server
```bash
php artisan serve
```

App will be available at 👉 `http://127.0.0.1:8000`

---

## 📥 Import Contacts from XML
1. Go to **Upload XML** page.  
2. Choose your XML file (example file included).  
3. Click **Upload** → Contacts will be stored in the database.  

Example XML:
```xml
<contacts>
    <contact>
        <name>John Doe</name>
        <phone>+1 123 4567890</phone>
    </contact>
    <contact>
        <name>Jane Smith</name>
        <phone>+1 987 6543210</phone>
    </contact>
</contacts>
```