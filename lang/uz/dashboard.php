<?php

return [
    'sections' => [
        // DASHBOARD
        'dashboard' => "Bosh sahifa",
        'settings' => "Sozlamalar",
        'general' => "Umumiy",

        // USER-MANAGEMENT
        'user-management' => "Foydalanuvchi boshqaruvi",
        'users' => "Foydalanuvchilar",
        'user' => "Foydalanuvchi",
        'roles' => "Ro'llar",
        'role' => "Ro'l",
        'permissions' => "Ruxsatlar",
        'permission' => "Ruxsat",

        // INFORMATION
        'information' => "Ma'lumotlar",
        'services' => "Xizmatlar",
        'service' => "Xizmat",
        'branches' => "Filiallar",
        'branch' => "Filial",
        'teachers' => "Pedagoglar",
        'teacher' => "Pedagog",
        'clients' => "Klientlar",
        'client' => "Klient",
        'types' => "Turlar",
        'statuses' => "Holatlar",
        'status' => "Holati",
        'payments' => "To'lov turlari",
        'payment' => "To'lov turi",
        'relatives' => "Qarindoshlik",
        'relative' => "Qarindosh",
        'statuses-appointments' => "Dars holatlari",
        'statuses-appointment' => "Dars holati",

        // REPORTS
        'reports' =>  "Hisobotlar",
        'report' =>  "Hisobot",
        'daily-reports' => "Kunlik hisobot",
        'debts' => "Qarzlar",

        // MANAGEMENT
        'management' =>  "Menejment",
        'appointments' => "Darslar",
        'appointment' => "Dars",
        'consultations' => "Konsultatsiya",
        'consultation' => "Konsultatsiya",
        'consumptions' =>  "Xarajatlar",
        'consumption' =>  "Xarajat",
    ],

    'fields' => [
        // USERS
        'name' => "Ism",
        'email' => "Pochta",
        'password' => "Parol",
        'photo' => "Rasm",
        'role' => "Ro'l",

        // ROLE
        'title' => 'Nomi',

        // PERMISSIONS
        'key' => "Kaliti",
        'translation' => "Ta'rifi",

        // CLIENTS
        'branch_id' => "Filiali",
        'first_name' => "Ismi",
        'last_name' => "Familiyasi",
        'birth_date' => "Tug'ilsan sanasi",

        // RELATIVES
        'fullname' => "To'liq ismi",
        'phone_number' => "Telefon raqami",
        'relative_status' => "Qarindoshlik holati",

        // SERVICE
        'price' => "Narxi",

        // MANAGEMENT
        'amount' => "Qiymat",
        'comment' => "Izoh",

        // GENERAL
        'id' => "ID",
        'created_at' => "Yaratilgan vaqt",
        'actions' => "Amallar",
        'info' => "Ma'lumotlar",
        'date' => "Sana",
        'time' => "Vaqti",

        // DAILY REPORT
        'count'=>  "Son",
        'income' => "Tushum",
        'outcome' => "Chiqim",
        'benefit' => "Foyda",
        'cash' => "Naqd",
        'card' => "Karta",
        'debt' => "Qarz",

        // CONSULTATIONS
        'number' => "Raqami",
        'client_name' => "Klient ismi",
        'payment_amount' => "To'lov miqdori",
        'start_time' => "Boshlanish vaqti",
        'end_time' => "Tugash vaqti",

        // APPOINTMENT
        'registration' => "Registratsiya",
        'register-info' => "Registratsiya ma'lumotlari",
        'payments' => "To'lovlar",
        'start_date' => "Boshlanish sanasi",
        'end_date' => "Tugash sanasi",
        'teacher_salary' => "Pedagog oyligi",
        'service_price' => "Xizmat narxi",
    ],

    'filters' => [
        'all' => "Hammasi",
        'search' => "Qidirish",
        'active' => "Faol",
        'inactive' => "Nofaol",
        'showing' => "Ko'rsatmoqda",
        'data' => "ma'lumotdan",
        'from' => 'tadan',
        'to' => 'tagacha',
        'choose' => "Tanla",
        'chosen' => "Tanlangan",
        'begin_date' => "Boshlangan sana",
        'end_date' => "Tugagan sana",
        'all-with' => "Barcha",
        'hours' => "Soatlar",
    ],

    'actions' => [
        'new' => "Yangi",
        'back' => "Ortga",
        'upload' => "Yuklash",
        'create' => "Yaratish",
        'create-another' => "Yaratish va yana",
        'edit' => "O'zgartirish",
        'update' => "O'zgartirish",
        'update-stay' => "O'zgartir va qol",
        'restore' => "Tiklash",
        'delete' => "O'chirish",
        'force-delete' => "To'liq o'chirish",
        'close' => "Yopish",
        'add' => "Qo'shish",
        'cancel' => "Bekor qilish",
        'reschedule' => "Qayta rejalashtirish",
    ],

    'warnings' => [
        // USERS
        'have-not-photo' => "rasmi yo'q",
        'added-clients-today' => "Bugun qo'shilganlar soni",
        'scheduled-consultations-today' => "Bugunga belgilanganlar soni",
        'today-consumptions' => "Bugungi xarajatlar",
    ],

    'dispatches' => [
        'successfully' => "Muvaffaqiyatli",
        'created' => "yaratildi",
        'updated' => "o'zgartirildi",
        'restored' => "tiklandi",
        'deleted' => "o'chirildi",
        'force-deleted' => "to'liq o'chirildi",
        'canceled' => "bekor qilindi",
        'rescheduled' => "qayta rejalandi",
    ],
];
