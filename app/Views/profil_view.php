<?php
// profile_view.php
// Contoh sederhana view profile memakai PHP + Bootstrap 5
// Asumsikan data user disediakan dalam array $user (dari controller / query DB)

if (!isset($user)) {
    // contoh data sementara (ganti dengan data nyata dari DB)
    $user = [
        'id' => 1,
        'name' => 'Guntur Lailam Yuro',
        'username' => 'gunturl',
        'email' => 'guntur@example.com',
        'role' => 'Web Developer',
        'about' => 'Saya adalah calon full-stack developer. Fokus ke JavaScript, PHP, dan cybersecurity. Sedang belajar membuat portofolio yang rapi dan profesional.',
        'avatar' => null, // path ke file avatar atau null untuk pakai placeholder
        'location' => 'Padang, Indonesia',
        'website' => 'https://gunturlailam.example.com',
        'skills' => ['HTML', 'CSS', 'Bootstrap', 'JavaScript', 'PHP', 'MySQL'],
        'projects' => [
            [
                'title' => 'E-commerce Bucket Karra',
                'desc' => 'Website penjualan buket bunga (tugas kuliah). HTML/CSS/Bootstrap + PHP/MySQL.',
                'link' => '#'
            ],
            [
                'title' => 'Inventory Manager',
                'desc' => 'Aplikasi manajemen barang dengan fitur CRUD, berbasis PHP & MySQL.',
                'link' => '#'
            ]
        ],
        'social' => [
            'linkedin' => 'https://www.linkedin.com/in/gunturlailam/',
            'github' => 'https://github.com/gunturl',
        ],
        'achievements' => [
            [
                'title' => 'Minang Youth Competition Juara 2',
                'year' => '2019',
                'description' => 'Kompetisi pemuda Minang tingkat regional',
                'icon' => 'fas fa-trophy',
                'type' => 'competition'
            ],
            [
                'title' => 'Juara Kelas SMP 33 Padang',
                'year' => '2015-2017',
                'description' => 'Juara kelas 7, 8, dan 9 di SMP Negeri 33 Padang',
                'icon' => 'fas fa-medal',
                'type' => 'academic'
            ],
            [
                'title' => 'Ketua Sekbid Agama SMP 33 Padang',
                'year' => '2015',
                'description' => 'Memimpin bidang keagamaan di organisasi sekolah',
                'icon' => 'fas fa-user-tie',
                'type' => 'leadership'
            ]
        ]
    ];
}

// helper untuk escaping output
function e($v)
{
    return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8');
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil - <?= e($user['name']); ?></title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    :root {
        --primary-gradient: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
        --secondary-gradient: linear-gradient(135deg, #fecaca 0%, #fca5a5 100%);
        --success-gradient: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
        --premium-gradient: linear-gradient(135deg, #dc2626 0%, #ef4444 50%, #f87171 100%);
        --glass-gradient: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.8) 100%);
        --card-shadow: 0 20px 60px rgba(220, 38, 38, 0.1);
        --card-shadow-hover: 0 30px 80px rgba(220, 38, 38, 0.2);
        --premium-shadow: 0 25px 50px rgba(220, 38, 38, 0.3);
        --text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        --border-radius: 20px;
        --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        --white-primary: #ffffff;
        --red-primary: #dc2626;
        --red-light: #fecaca;
        --red-dark: #991b1b;
    }

    body {
        background: linear-gradient(135deg, #ffffff 0%, #fef2f2 25%, #fecaca 50%, #fca5a5 75%, #f87171 100%);
        background-size: 400% 400%;
        animation: gradientShift 15s ease infinite;
        min-height: 100vh;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        position: relative;
        overflow-x: hidden;
    }

    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background:
            radial-gradient(circle at 20% 80%, rgba(220, 38, 38, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(239, 68, 68, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 40% 40%, rgba(252, 165, 165, 0.05) 0%, transparent 50%);
        pointer-events: none;
        z-index: -1;
    }

    @keyframes gradientShift {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    .profile-avatar {
        width: 180px;
        height: 180px;
        object-fit: cover;
        border-radius: 50%;
        border: 8px solid var(--white-primary);
        box-shadow:
            0 0 0 4px var(--red-light),
            var(--premium-shadow),
            inset 0 0 0 1px var(--red-primary);
        transition: var(--transition);
        position: relative;
        backdrop-filter: blur(10px);
    }

    .profile-avatar:hover {
        transform: scale(1.08) rotate(2deg);
        box-shadow:
            0 0 0 6px var(--red-light),
            0 40px 100px rgba(220, 38, 38, 0.4),
            inset 0 0 0 1px var(--red-primary);
        filter: brightness(1.1) saturate(1.2);
    }

    .profile-avatar::before {
        content: '';
        position: absolute;
        top: -8px;
        left: -8px;
        right: -8px;
        bottom: -8px;
        border-radius: 50%;
        background: var(--premium-gradient);
        z-index: -1;
        opacity: 0;
        transition: var(--transition);
    }

    .profile-avatar:hover::before {
        opacity: 1;
        animation: rotate 3s linear infinite;
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .hero-bg {
        background: var(--premium-gradient);
        height: 250px;
        position: relative;
        overflow: hidden;
        border-radius: 0 0 30px 30px;
    }

    .hero-bg::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 70% 80%, rgba(255, 255, 255, 0.2) 0%, transparent 50%),
            url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="white" opacity="0.2"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.8;
        animation: float 6s ease-in-out infinite;
    }

    .hero-bg::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
        animation: shimmer 3s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        50% {
            transform: translateY(-10px) rotate(1deg);
        }
    }

    @keyframes shimmer {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    .skill-badge {
        margin: 8px 4px;
        padding: 14px 24px;
        border-radius: 35px;
        background: var(--white-primary);
        color: var(--red-primary);
        font-weight: 700;
        font-size: 0.85em;
        transition: var(--transition);
        cursor: pointer;
        position: relative;
        overflow: hidden;
        text-shadow: none;
        box-shadow:
            0 4px 15px rgba(220, 38, 38, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
        border: 2px solid var(--red-light);
        display: inline-block;
        min-width: 80px;
        text-align: center;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .skill-badge::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(220, 38, 38, 0.1), transparent);
        transition: var(--transition);
    }

    .skill-badge::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--premium-gradient);
        opacity: 0;
        transition: var(--transition);
        z-index: -1;
        border-radius: inherit;
    }

    .skill-badge:hover {
        transform: translateY(-6px) scale(1.08);
        box-shadow:
            0 20px 40px rgba(220, 38, 38, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
        color: var(--white-primary);
        border-color: var(--red-primary);
    }

    .skill-badge:hover::before {
        left: 100%;
    }

    .skill-badge:hover::after {
        opacity: 1;
    }

    /* Skills Container */
    .skills-container {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        justify-content: flex-start;
        align-items: center;
        min-height: 60px;
        padding: 10px 0;
    }

    .skills-container:empty::before {
        content: 'Belum ada skill yang ditambahkan';
        color: #999;
        font-style: italic;
        display: block;
        text-align: center;
        padding: 20px;
        background: var(--red-light);
        border-radius: 10px;
        border: 2px dashed var(--red-primary);
    }

    /* Add Skill Button */
    .add-skill-btn {
        background: var(--white-primary);
        border: 2px dashed var(--red-primary);
        color: var(--red-primary);
        padding: 14px 24px;
        border-radius: 35px;
        font-weight: 600;
        font-size: 0.85em;
        transition: var(--transition);
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin: 8px 4px;
        min-width: 80px;
        justify-content: center;
    }

    .add-skill-btn:hover {
        background: var(--red-primary);
        color: var(--white-primary);
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 10px 25px rgba(220, 38, 38, 0.3);
    }

    /* Skill Badge with Icon */
    .skill-badge .skill-icon {
        margin-right: 6px;
        font-size: 0.9em;
    }

    .skill-badge .remove-skill {
        margin-left: 8px;
        opacity: 0.7;
        transition: var(--transition);
        cursor: pointer;
        font-size: 0.8em;
    }

    .skill-badge .remove-skill:hover {
        opacity: 1;
        transform: scale(1.2);
    }

    .project-card {
        transition: var(--transition);
        border: none;
        border-radius: var(--border-radius);
        overflow: hidden;
        background: rgba(255, 255, 255, 0.95);
        box-shadow: var(--card-shadow);
        position: relative;
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .project-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--premium-gradient);
        opacity: 0;
        transition: var(--transition);
        z-index: -1;
    }

    .project-card:hover {
        transform: translateY(-12px) scale(1.02);
        box-shadow: var(--card-shadow-hover);
    }

    .project-card:hover::before {
        opacity: 0.05;
    }

    .card {
        border: none;
        border-radius: var(--border-radius);
        box-shadow: var(--card-shadow);
        transition: var(--transition);
        background: var(--white-primary);
        backdrop-filter: blur(20px);
        border: 2px solid var(--red-light);
        position: relative;
        overflow: hidden;
    }

    .card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--glass-gradient);
        z-index: -1;
    }

    .card:hover {
        transform: translateY(-8px) scale(1.01);
        box-shadow: var(--card-shadow-hover);
        border-color: var(--red-primary);
        background: var(--white-primary);
    }

    .btn {
        border-radius: 30px;
        padding: 12px 30px;
        font-weight: 600;
        transition: var(--transition);
        border: none;
        position: relative;
        overflow: hidden;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.9em;
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: var(--transition);
    }

    .btn:hover::before {
        left: 100%;
    }

    .btn-primary {
        background: var(--premium-gradient);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        color: white;
        text-shadow: var(--text-shadow);
    }

    .btn-primary:hover {
        transform: translateY(-4px) scale(1.05);
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.6);
        filter: brightness(1.1);
    }

    .btn-outline-primary {
        border: 2px solid var(--red-primary);
        color: var(--red-primary);
        background: var(--white-primary);
    }

    .btn-outline-primary:hover {
        background: var(--primary-gradient);
        border-color: transparent;
        transform: translateY(-2px);
        color: var(--white-primary);
    }

    .edit-mode {
        background: #f8f9fa;
        border: 2px dashed #dee2e6;
        border-radius: 10px;
        padding: 15px;
        margin: 10px 0;
    }

    .edit-input {
        border: none;
        background: transparent;
        width: 100%;
        font-size: inherit;
        font-weight: inherit;
        color: inherit;
        border-bottom: 2px solid var(--red-primary);
        padding: 5px 0;
    }

    .edit-input:focus {
        outline: none;
        border-bottom-color: var(--red-dark);
    }

    .fade-in {
        animation: fadeIn 0.6s ease-in;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .pulse {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(1);
        }
    }

    .glass-effect {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .social-btn {
        border-radius: 50%;
        width: 45px;
        height: 45px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin: 0 5px;
        transition: all 0.3s ease;
    }

    .social-btn:hover {
        transform: translateY(-3px) scale(1.1);
    }

    .contact-item {
        padding: 16px 20px;
        margin: 8px 0;
        border-radius: 15px;
        background: var(--white-primary);
        border: 2px solid var(--red-light);
        transition: var(--transition);
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(220, 38, 38, 0.1);
    }

    .contact-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--premium-gradient);
        opacity: 0;
        transition: var(--transition);
        z-index: -1;
    }

    .contact-item:hover {
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 15px 35px rgba(220, 38, 38, 0.2);
        border-color: var(--red-primary);
        background: var(--white-primary);
    }

    .contact-item:hover::before {
        opacity: 0.05;
    }

    .contact-item .contact-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--red-light);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        transition: var(--transition);
        color: var(--red-primary);
        font-size: 1.1em;
    }

    .contact-item:hover .contact-icon {
        background: var(--red-primary);
        color: var(--white-primary);
        transform: scale(1.1);
    }

    .contact-item .contact-content {
        flex: 1;
        min-width: 0;
    }

    .contact-item .contact-label {
        font-weight: 600;
        color: var(--red-primary);
        font-size: 0.9em;
        margin-bottom: 4px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .contact-item .contact-value {
        color: #333;
        font-size: 0.95em;
        word-break: break-all;
        transition: var(--transition);
    }

    .contact-item:hover .contact-value {
        color: var(--red-primary);
    }

    .contact-item .contact-actions {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .contact-item .contact-btn {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        border: 2px solid var(--red-light);
        background: var(--white-primary);
        color: var(--red-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
        cursor: pointer;
        font-size: 0.9em;
    }

    .contact-item .contact-btn:hover {
        background: var(--red-primary);
        color: var(--white-primary);
        transform: scale(1.1);
        box-shadow: 0 5px 15px rgba(220, 38, 38, 0.3);
    }

    /* Contact Section Header */
    .contact-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .contact-header h5 {
        margin: 0;
        color: var(--red-primary);
        font-weight: 700;
    }

    .add-contact-btn {
        background: var(--white-primary);
        border: 2px solid var(--red-primary);
        color: var(--red-primary);
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.8em;
        font-weight: 600;
        transition: var(--transition);
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .add-contact-btn:hover {
        background: var(--red-primary);
        color: var(--white-primary);
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 8px 20px rgba(220, 38, 38, 0.3);
    }

    /* Achievements Section */
    .achievement-card {
        background: var(--white-primary);
        border: 2px solid var(--red-light);
        border-radius: 20px;
        padding: 20px;
        margin: 12px 0;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(220, 38, 38, 0.1);
    }

    .achievement-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--premium-gradient);
        opacity: 0;
        transition: var(--transition);
        z-index: -1;
    }

    .achievement-card:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 20px 40px rgba(220, 38, 38, 0.2);
        border-color: var(--red-primary);
    }

    .achievement-card:hover::before {
        opacity: 0.05;
    }

    .achievement-header {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
    }

    .achievement-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: var(--red-light);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        transition: var(--transition);
        color: var(--red-primary);
        font-size: 1.3em;
    }

    .achievement-card:hover .achievement-icon {
        background: var(--red-primary);
        color: var(--white-primary);
        transform: scale(1.1);
    }

    .achievement-content {
        flex: 1;
        min-width: 0;
    }

    .achievement-title {
        font-weight: 700;
        color: var(--red-primary);
        font-size: 1.1em;
        margin-bottom: 4px;
        line-height: 1.3;
    }

    .achievement-year {
        background: var(--red-primary);
        color: var(--white-primary);
        padding: 4px 12px;
        border-radius: 15px;
        font-size: 0.8em;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .achievement-description {
        color: #666;
        font-size: 0.9em;
        line-height: 1.4;
        margin-top: 8px;
    }

    .achievement-type {
        position: absolute;
        top: 15px;
        right: 15px;
        padding: 4px 10px;
        border-radius: 10px;
        font-size: 0.7em;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .achievement-type.competition {
        background: rgba(255, 193, 7, 0.2);
        color: #ff8c00;
        border: 1px solid rgba(255, 193, 7, 0.3);
    }

    .achievement-type.academic {
        background: rgba(40, 167, 69, 0.2);
        color: #28a745;
        border: 1px solid rgba(40, 167, 69, 0.3);
    }

    .achievement-type.leadership {
        background: rgba(0, 123, 255, 0.2);
        color: #007bff;
        border: 1px solid rgba(0, 123, 255, 0.3);
    }

    .achievements-container {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .achievements-container .row {
        margin: 0;
    }

    .achievements-container .col-md-6 {
        padding: 0 8px;
    }

    .achievement-actions {
        display: flex;
        gap: 8px;
        margin-top: 12px;
        opacity: 0;
        transition: var(--transition);
    }

    .achievement-card:hover .achievement-actions {
        opacity: 1;
    }

    .achievement-btn {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        border: 2px solid var(--red-light);
        background: var(--white-primary);
        color: var(--red-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
        cursor: pointer;
        font-size: 0.8em;
    }

    .achievement-btn:hover {
        background: var(--red-primary);
        color: var(--white-primary);
        transform: scale(1.1);
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
    }

    .add-achievement-btn {
        background: var(--white-primary);
        border: 2px dashed var(--red-primary);
        color: var(--red-primary);
        padding: 16px 24px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9em;
        transition: var(--transition);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin: 12px 0;
        min-height: 60px;
    }

    .add-achievement-btn:hover {
        background: var(--red-primary);
        color: var(--white-primary);
        transform: translateY(-2px) scale(1.02);
        box-shadow: 0 10px 25px rgba(220, 38, 38, 0.3);
    }

    .stats-card {
        background: var(--success-gradient);
        color: white;
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        margin: 10px 0;
    }

    .floating-action {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 1000;
        border-radius: 50%;
        width: 70px;
        height: 70px;
        background: var(--premium-gradient);
        color: white;
        border: none;
        box-shadow: 0 15px 40px rgba(102, 126, 234, 0.5);
        transition: var(--transition);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
    }

    .floating-action::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, transparent 70%);
        opacity: 0;
        transition: var(--transition);
    }

    .floating-action:hover {
        transform: scale(1.15) rotate(5deg);
        box-shadow: 0 20px 50px rgba(220, 38, 38, 0.7);
        filter: brightness(1.2);
    }

    .floating-action:hover::before {
        opacity: 1;
    }

    /* Premium Animations */
    .premium-glow {
        animation: premiumGlow 3s ease-in-out infinite alternate;
    }

    @keyframes premiumGlow {
        0% {
            box-shadow: 0 0 20px rgba(220, 38, 38, 0.3);
        }

        100% {
            box-shadow: 0 0 40px rgba(220, 38, 38, 0.6), 0 0 60px rgba(239, 68, 68, 0.4);
        }
    }

    .pulse-premium {
        animation: pulsePremium 2s ease-in-out infinite;
    }

    @keyframes pulsePremium {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(1);
        }
    }

    .floating-premium {
        animation: floatingPremium 4s ease-in-out infinite;
    }

    @keyframes floatingPremium {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    .rotate-premium {
        animation: rotatePremium 8s linear infinite;
    }

    @keyframes rotatePremium {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    /* Text Effects */
    .text-premium {
        background: var(--premium-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 700;
        text-shadow: none;
    }

    .text-glow {
        text-shadow: 0 0 10px rgba(220, 38, 38, 0.5);
    }

    /* Interactive Elements */
    .interactive-hover {
        transition: var(--transition);
        cursor: pointer;
    }

    .interactive-hover:hover {
        transform: translateY(-2px) scale(1.02);
        filter: brightness(1.1);
    }

    /* Premium Cards */
    .premium-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow:
            0 8px 32px rgba(0, 0, 0, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
    }

    .premium-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--premium-gradient);
        opacity: 0.05;
        z-index: -1;
        border-radius: inherit;
    }

    /* Stats Cards Enhancement */
    .stats-card {
        background: var(--premium-gradient);
        color: white;
        border-radius: var(--border-radius);
        padding: 25px;
        text-align: center;
        margin: 10px 0;
        position: relative;
        overflow: hidden;
        box-shadow: var(--premium-shadow);
        transition: var(--transition);
    }

    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.2) 0%, transparent 50%);
        opacity: 0;
        transition: var(--transition);
    }

    .stats-card:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 20px 60px rgba(220, 38, 38, 0.4);
    }

    .stats-card:hover::before {
        opacity: 1;
    }

    /* Social Buttons Enhancement */
    .social-btn {
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin: 0 8px;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.2);
    }

    .social-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--premium-gradient);
        opacity: 0;
        transition: var(--transition);
        z-index: -1;
    }

    .social-btn:hover {
        transform: translateY(-5px) scale(1.1) rotate(5deg);
        box-shadow: 0 10px 30px rgba(220, 38, 38, 0.4);
    }

    .social-btn:hover::before {
        opacity: 1;
    }

    @media (max-width: 768px) {
        .profile-avatar {
            width: 140px;
            height: 140px;
        }

        .hero-bg {
            height: 200px;
        }

        .floating-action {
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
        }

        .skill-badge {
            padding: 12px 20px;
            font-size: 0.75em;
            margin: 6px 3px;
            min-width: 70px;
        }

        .skills-container {
            gap: 6px;
            padding: 8px 0;
        }

        .add-skill-btn {
            padding: 12px 20px;
            font-size: 0.75em;
            margin: 6px 3px;
            min-width: 70px;
        }

        .contact-item {
            padding: 12px 16px;
            margin: 6px 0;
        }

        .contact-item .contact-icon {
            width: 35px;
            height: 35px;
            margin-right: 12px;
            font-size: 1em;
        }

        .contact-item .contact-btn {
            width: 30px;
            height: 30px;
            font-size: 0.8em;
        }

        .add-contact-btn {
            padding: 6px 12px;
            font-size: 0.75em;
        }

        .achievement-card {
            padding: 16px;
            margin: 8px 0;
        }

        .achievement-icon {
            width: 40px;
            height: 40px;
            font-size: 1.1em;
        }

        .achievement-title {
            font-size: 1em;
        }

        .achievement-year {
            font-size: 0.75em;
            padding: 3px 10px;
        }

        .achievement-description {
            font-size: 0.85em;
        }

        .achievement-type {
            font-size: 0.65em;
            padding: 3px 8px;
        }

        .add-achievement-btn {
            padding: 12px 20px;
            font-size: 0.85em;
            min-height: 50px;
        }
    }
    </style>
</head>

<body class="bg-light">

    <div class="container py-4 fade-in">

        <!-- Header / Hero -->
        <div class="card overflow-hidden mb-4">
            <div class="hero-bg"></div>
            <div class="card-body position-relative" style="margin-top: -80px;">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="position-relative">
                            <?php if (!empty($user['avatar'])): ?>
                            <img src="<?= e($user['avatar']); ?>" alt="avatar" class="profile-avatar"
                                id="profileAvatar">
                            <?php else: ?>
                            <div class="bg-white d-flex justify-content-center align-items-center profile-avatar"
                                id="profileAvatar">
                                <span
                                    class="fs-3 text-secondary"><?= strtoupper(substr(e($user['name']), 0, 1)); ?></span>
                            </div>
                            <?php endif; ?>
                            <button class="btn btn-sm btn-light position-absolute"
                                style="bottom: 10px; right: 10px; border-radius: 50%; width: 35px; height: 35px; padding: 0;"
                                onclick="editAvatar()" title="Edit Avatar">
                                <i class="fas fa-camera"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col">
                        <h3 class="mb-0 text-premium text-glow" id="userName" onclick="editField('userName', 'name')"
                            style="cursor: pointer;">
                            <?= e($user['name']); ?>
                            <i class="fas fa-edit ms-2 text-muted" style="font-size: 0.8em;"></i>
                        </h3>
                        <div class="text-muted mb-2" id="userRole" onclick="editField('userRole', 'role')"
                            style="cursor: pointer;">
                            <?= e($user['role']); ?> • <span id="userLocation"
                                onclick="editField('userLocation', 'location')"
                                style="cursor: pointer;"><?= e($user['location']); ?></span>
                            <i class="fas fa-edit ms-2 text-muted" style="font-size: 0.8em;"></i>
                        </div>
                        <p class="mb-1" id="userAbout" onclick="editField('userAbout', 'about')"
                            style="cursor: pointer;">
                            <?= e($user['about']); ?>
                            <i class="fas fa-edit ms-2 text-muted" style="font-size: 0.8em;"></i>
                        </p>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="<?= e($user['social']['linkedin'] ?? '#'); ?>"
                                class="btn btn-outline-primary btn-sm social-btn floating-premium" target="_blank"
                                title="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="<?= e($user['social']['github'] ?? '#'); ?>"
                                class="btn btn-outline-dark btn-sm social-btn floating-premium" target="_blank"
                                title="GitHub">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="mailto:<?= e($user['email']); ?>"
                                class="btn btn-outline-success btn-sm social-btn floating-premium" title="Email">
                                <i class="fas fa-envelope"></i>
                            </a>
                            <a href="<?= e($user['website'] ?? '#'); ?>"
                                class="btn btn-outline-info btn-sm social-btn floating-premium" target="_blank"
                                title="Website">
                                <i class="fas fa-globe"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-auto text-end">
                        <button class="btn btn-primary premium-glow pulse-premium" onclick="toggleEditMode()"
                            id="editToggleBtn">
                            <i class="fas fa-edit me-2"></i>Edit Profil
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Left: Skills & Contact -->
            <div class="col-lg-4">
                <!-- Stats Cards -->
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="stats-card premium-glow">
                            <h4 class="mb-1 text-glow"><?= count($user['skills'] ?? []); ?></h4>
                            <small>Skills</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stats-card premium-glow">
                            <h4 class="mb-1 text-glow"><?= count($user['projects'] ?? []); ?></h4>
                            <small>Projects</small>
                        </div>
                    </div>
                </div>

                <div class="card mb-3 premium-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title mb-0 text-premium">
                                <i class="fas fa-code me-2 text-primary"></i>Keahlian
                            </h5>
                            <button class="btn btn-sm btn-outline-primary premium-glow" onclick="editSkills()"
                                title="Edit Skills">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <div class="skills-container" id="skillsContainer">
                            <?php if (!empty($user['skills']) && is_array($user['skills'])): ?>
                            <?php foreach ($user['skills'] as $index => $skill): ?>
                            <span class="skill-badge" id="skill-<?= $index; ?>" onclick="editSkill(<?= $index; ?>)">
                                <i class="fas fa-code skill-icon"></i>
                                <?= e($skill); ?>
                                <i class="fas fa-times remove-skill" onclick="removeSkill(<?= $index; ?>, event)"></i>
                            </span>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <button class="add-skill-btn" onclick="editSkills()" title="Tambah Skill">
                                <i class="fas fa-plus"></i>
                                <span>Tambah</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card mb-3 premium-card">
                    <div class="card-body">
                        <div class="contact-header">
                            <h5 class="text-premium">
                                <i class="fas fa-address-book me-2"></i>Kontak
                            </h5>
                            <button class="add-contact-btn" onclick="addContact()" title="Tambah Kontak">
                                <i class="fas fa-plus"></i>
                                <span>Tambah</span>
                            </button>
                        </div>

                        <div class="contact-item">
                            <div class="d-flex align-items-center">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-content">
                                    <div class="contact-label">Email</div>
                                    <div class="contact-value">
                                        <a href="mailto:<?= e($user['email']); ?>"
                                            class="text-decoration-none"><?= e($user['email']); ?></a>
                                    </div>
                                </div>
                                <div class="contact-actions">
                                    <button class="contact-btn" onclick="editContact('email')" title="Edit Email">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="contact-btn" onclick="copyToClipboard('<?= e($user['email']); ?>')"
                                        title="Copy Email">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <?php if (!empty($user['website'])): ?>
                        <div class="contact-item">
                            <div class="d-flex align-items-center">
                                <div class="contact-icon">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <div class="contact-content">
                                    <div class="contact-label">Website</div>
                                    <div class="contact-value">
                                        <a href="<?= e($user['website']); ?>" target="_blank"
                                            class="text-decoration-none"><?= e($user['website']); ?></a>
                                    </div>
                                </div>
                                <div class="contact-actions">
                                    <button class="contact-btn" onclick="editContact('website')" title="Edit Website">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="contact-btn" onclick="copyToClipboard('<?= e($user['website']); ?>')"
                                        title="Copy Website">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if (!empty($user['social']['linkedin'])): ?>
                        <div class="contact-item">
                            <div class="d-flex align-items-center">
                                <div class="contact-icon">
                                    <i class="fab fa-linkedin-in"></i>
                                </div>
                                <div class="contact-content">
                                    <div class="contact-label">LinkedIn</div>
                                    <div class="contact-value">
                                        <a href="<?= e($user['social']['linkedin']); ?>" target="_blank"
                                            class="text-decoration-none"><?= e($user['social']['linkedin']); ?></a>
                                    </div>
                                </div>
                                <div class="contact-actions">
                                    <button class="contact-btn" onclick="editContact('linkedin')" title="Edit LinkedIn">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="contact-btn"
                                        onclick="copyToClipboard('<?= e($user['social']['linkedin']); ?>')"
                                        title="Copy LinkedIn">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if (!empty($user['social']['github'])): ?>
                        <div class="contact-item">
                            <div class="d-flex align-items-center">
                                <div class="contact-icon">
                                    <i class="fab fa-github"></i>
                                </div>
                                <div class="contact-content">
                                    <div class="contact-label">GitHub</div>
                                    <div class="contact-value">
                                        <a href="<?= e($user['social']['github']); ?>" target="_blank"
                                            class="text-decoration-none"><?= e($user['social']['github']); ?></a>
                                    </div>
                                </div>
                                <div class="contact-actions">
                                    <button class="contact-btn" onclick="editContact('github')" title="Edit GitHub">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="contact-btn"
                                        onclick="copyToClipboard('<?= e($user['social']['github']); ?>')"
                                        title="Copy GitHub">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

            <!-- Right: Projects -->
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="mb-0 text-premium text-glow">
                        <i class="fas fa-project-diagram me-2 text-primary"></i>Proyek & Portofolio
                    </h5>
                    <button class="btn btn-primary premium-glow pulse-premium" onclick="addProject()">
                        <i class="fas fa-plus me-2"></i>Tambah Proyek
                    </button>
                </div>

                <?php if (!empty($user['projects']) && is_array($user['projects'])): ?>
                <div class="row" id="projectsContainer">
                    <?php foreach ($user['projects'] as $index => $p): ?>
                    <div class="col-md-6 mb-4" id="project-<?= $index; ?>">
                        <div class="card project-card h-100">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="card-title mb-0" id="project-title-<?= $index; ?>"
                                        onclick="editProjectField(<?= $index; ?>, 'title')" style="cursor: pointer;">
                                        <?= e($p['title']); ?>
                                        <i class="fas fa-edit ms-2 text-muted" style="font-size: 0.7em;"></i>
                                    </h6>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" onclick="editProject(<?= $index; ?>)">
                                                    <i class="fas fa-edit me-2"></i>Edit
                                                </a></li>
                                            <li><a class="dropdown-item text-danger" href="#"
                                                    onclick="deleteProject(<?= $index; ?>)">
                                                    <i class="fas fa-trash me-2"></i>Hapus
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="card-text text-muted small flex-grow-1" id="project-desc-<?= $index; ?>"
                                    onclick="editProjectField(<?= $index; ?>, 'desc')" style="cursor: pointer;">
                                    <?= e($p['desc']); ?>
                                    <i class="fas fa-edit ms-2 text-muted" style="font-size: 0.7em;"></i>
                                </p>
                                <div class="mt-auto">
                                    <div class="d-flex gap-2">
                                        <a href="<?= e($p['link'] ?? '#'); ?>" class="btn btn-sm btn-outline-primary"
                                            target="_blank">
                                            <i class="fas fa-external-link-alt me-1"></i>Lihat
                                        </a>
                                        <button class="btn btn-sm btn-outline-warning"
                                            onclick="editProject(<?= $index; ?>)">
                                            <i class="fas fa-edit me-1"></i>Edit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php else: ?>
                <div class="card">
                    <div class="card-body text-center text-muted py-5">
                        <i class="fas fa-folder-open fa-3x mb-3 text-primary"></i>
                        <h6 class="mb-2">Belum ada proyek</h6>
                        <p class="mb-3">Tambahkan proyek untuk menampilkan portofolio kamu.</p>
                        <button class="btn btn-primary" onclick="addProject()">
                            <i class="fas fa-plus me-2"></i>Tambah Proyek Pertama
                        </button>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Achievements Section -->
                <div class="card mt-4 premium-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="mb-0 text-premium text-glow">
                                <i class="fas fa-trophy me-2"></i>Prestasi & Penghargaan
                            </h5>
                            <button class="btn btn-primary premium-glow pulse-premium" onclick="addAchievement()"
                                title="Tambah Prestasi">
                                <i class="fas fa-plus me-2"></i>Tambah Prestasi
                            </button>
                        </div>

                        <div class="achievements-container" id="achievementsContainer">
                            <?php if (!empty($user['achievements']) && is_array($user['achievements'])): ?>
                            <div class="row">
                                <?php foreach ($user['achievements'] as $index => $achievement): ?>
                                <div class="col-md-6 mb-4">
                                    <div class="achievement-card" id="achievement-<?= $index; ?>">
                                        <div class="achievement-header">
                                            <div class="achievement-icon">
                                                <i class="<?= e($achievement['icon']); ?>"></i>
                                            </div>
                                            <div class="achievement-content">
                                                <div class="achievement-title"><?= e($achievement['title']); ?></div>
                                                <div class="achievement-year"><?= e($achievement['year']); ?></div>
                                            </div>
                                        </div>
                                        <div class="achievement-description">
                                            <?= e($achievement['description']); ?>
                                        </div>
                                        <div class="achievement-type <?= e($achievement['type']); ?>">
                                            <?= e($achievement['type']); ?>
                                        </div>
                                        <div class="achievement-actions">
                                            <button class="achievement-btn" onclick="editAchievement(<?= $index; ?>)"
                                                title="Edit Prestasi">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="achievement-btn" onclick="removeAchievement(<?= $index; ?>)"
                                                title="Hapus Prestasi">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- CTA Section -->
                <div class="card mt-4 premium-card premium-glow">
                    <div class="card-body text-center">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h6 class="mb-1 text-premium">Butuh bantuan membuat website atau portofolio?</h6>
                                <p class="text-muted mb-0">Saya siap membantu mewujudkan ide kreatif Anda!</p>
                            </div>
                            <div class="col-md-4 mt-3 mt-md-0">
                                <a href="mailto:<?= e($user['email']); ?>"
                                    class="btn btn-success btn-lg premium-glow pulse-premium">
                                    <i class="fas fa-envelope me-2"></i>Hubungi Saya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <footer class="text-center text-muted mt-5">
            <div class="card premium-card">
                <div class="card-body">
                    <small class="text-premium">© <?= date('Y'); ?> <?= e($user['name']); ?> — Dibuat dengan ❤️
                        menggunakan PHP +
                        Bootstrap</small>
                </div>
            </div>
        </footer>
    </div>

    <!-- Floating Action Button -->
    <button class="floating-action premium-glow pulse-premium" onclick="scrollToTop()" title="Kembali ke atas">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
    let editMode = false;
    let originalData = {};

    // Initialize page
    document.addEventListener('DOMContentLoaded', function() {
        // Add fade-in animation to cards
        const cards = document.querySelectorAll('.card');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
            card.classList.add('fade-in');
        });
    });

    // Toggle edit mode
    function toggleEditMode() {
        editMode = !editMode;
        const btn = document.getElementById('editToggleBtn');

        if (editMode) {
            btn.innerHTML = '<i class="fas fa-save me-2"></i>Simpan Perubahan';
            btn.classList.remove('btn-primary');
            btn.classList.add('btn-success');
            showEditIcons();
        } else {
            btn.innerHTML = '<i class="fas fa-edit me-2"></i>Edit Profil';
            btn.classList.remove('btn-success');
            btn.classList.add('btn-primary');
            hideEditIcons();
            saveChanges();
        }
    }

    // Show/hide edit icons
    function showEditIcons() {
        const editIcons = document.querySelectorAll('.fa-edit');
        editIcons.forEach(icon => icon.style.display = 'inline');
    }

    function hideEditIcons() {
        const editIcons = document.querySelectorAll('.fa-edit');
        editIcons.forEach(icon => icon.style.display = 'none');
    }

    // Edit field functionality
    function editField(elementId, fieldName) {
        if (!editMode) return;

        const element = document.getElementById(elementId);
        const originalText = element.textContent.trim();
        originalData[fieldName] = originalText;

        const input = document.createElement('input');
        input.type = 'text';
        input.className = 'edit-input';
        input.value = originalText;
        input.onblur = () => saveField(elementId, fieldName, input.value);
        input.onkeypress = (e) => {
            if (e.key === 'Enter') {
                saveField(elementId, fieldName, input.value);
            }
        };

        element.innerHTML = '';
        element.appendChild(input);
        input.focus();
        input.select();
    }

    // Save field changes
    function saveField(elementId, fieldName, newValue) {
        const element = document.getElementById(elementId);
        element.innerHTML = newValue + ' <i class="fas fa-edit ms-2 text-muted" style="font-size: 0.8em;"></i>';

        // Here you would typically send the data to your backend
        console.log(`Saving ${fieldName}: ${newValue}`);

        // Show success animation
        element.style.background = '#d4edda';
        setTimeout(() => {
            element.style.background = '';
        }, 1000);
    }

    // Edit avatar
    function editAvatar() {
        if (!editMode) return;

        const input = document.createElement('input');
        input.type = 'file';
        input.accept = 'image/*';
        input.onchange = (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const avatar = document.getElementById('profileAvatar');
                    if (avatar.tagName === 'IMG') {
                        avatar.src = e.target.result;
                    } else {
                        avatar.innerHTML = `<img src="${e.target.result}" alt="avatar" class="profile-avatar">`;
                    }
                };
                reader.readAsDataURL(file);
            }
        };
        input.click();
    }

    // Skills management
    function editSkills() {
        if (!editMode) return;

        const newSkill = prompt('Masukkan skill baru:');
        if (newSkill && newSkill.trim()) {
            addSkillToContainer(newSkill.trim());
        }
    }

    function addSkillToContainer(skill) {
        const container = document.getElementById('skillsContainer');
        const skillIndex = container.children.length - 1; // -1 because of the add button

        const skillBadge = document.createElement('span');
        skillBadge.className = 'skill-badge';
        skillBadge.id = `skill-${skillIndex}`;
        skillBadge.innerHTML = `
            <i class="fas fa-code skill-icon"></i>
            ${skill}
            <i class="fas fa-times remove-skill" onclick="removeSkill(${skillIndex}, event)"></i>
        `;
        skillBadge.onclick = () => editSkill(skillIndex);

        // Insert before the add button
        const addButton = container.querySelector('.add-skill-btn');
        container.insertBefore(skillBadge, addButton);

        // Add animation
        skillBadge.style.opacity = '0';
        skillBadge.style.transform = 'scale(0.8)';
        setTimeout(() => {
            skillBadge.style.transition = 'all 0.3s ease';
            skillBadge.style.opacity = '1';
            skillBadge.style.transform = 'scale(1)';
        }, 10);

        // Update stats
        updateStats();
    }

    function editSkill(index) {
        if (!editMode) {
            toggleEditMode();
        }

        const skillElement = document.getElementById(`skill-${index}`);
        const currentSkill = skillElement.textContent.replace(' ×', '').trim();
        const newSkill = prompt('Edit skill:', currentSkill);

        if (newSkill && newSkill.trim() && newSkill !== currentSkill) {
            skillElement.innerHTML =
                `${newSkill.trim()} <i class="fas fa-times remove-skill" onclick="removeSkill(${index}, event)"></i>`;
            showNotification('Skill berhasil diupdate!', 'success');
        }
    }

    function removeSkill(index, event) {
        if (event) event.stopPropagation();
        if (!editMode) return;

        const skillElement = document.getElementById(`skill-${index}`);
        if (skillElement) {
            // Add removal animation
            skillElement.style.transition = 'all 0.3s ease';
            skillElement.style.opacity = '0';
            skillElement.style.transform = 'scale(0.8)';

            setTimeout(() => {
                skillElement.remove();
                updateStats();
            }, 300);
        }
    }

    // Contact management
    function editContact(type) {
        if (!editMode) {
            toggleEditMode();
        }

        const currentValue = prompt(`Edit ${type}:`, '');
        if (currentValue !== null && currentValue.trim()) {
            console.log(`Updating ${type}: ${currentValue}`);
            // Here you would update the contact information
            showNotification(`${type} berhasil diupdate!`, 'success');
        }
    }

    function addContact() {
        if (!editMode) {
            toggleEditMode();
        }

        const contactType = prompt('Jenis kontak (email, website, linkedin, github, phone):');
        if (!contactType || !contactType.trim()) return;

        const contactValue = prompt(`Nilai ${contactType}:`);
        if (!contactValue || !contactValue.trim()) return;

        addContactToContainer(contactType.trim(), contactValue.trim());
    }

    function addContactToContainer(type, value) {
        const container = document.querySelector('.card-body');
        const contactIndex = container.querySelectorAll('.contact-item').length;

        const contactItem = document.createElement('div');
        contactItem.className = 'contact-item';
        contactItem.id = `contact-${contactIndex}`;

        const iconMap = {
            'email': 'fas fa-envelope',
            'website': 'fas fa-globe',
            'linkedin': 'fab fa-linkedin-in',
            'github': 'fab fa-github',
            'phone': 'fas fa-phone'
        };

        const icon = iconMap[type.toLowerCase()] || 'fas fa-link';

        contactItem.innerHTML = `
            <div class="d-flex align-items-center">
                <div class="contact-icon">
                    <i class="${icon}"></i>
                </div>
                <div class="contact-content">
                    <div class="contact-label">${type.charAt(0).toUpperCase() + type.slice(1)}</div>
                    <div class="contact-value">
                        <a href="${type === 'email' ? 'mailto:' : (type === 'phone' ? 'tel:' : '')}${value}" 
                           ${type !== 'email' && type !== 'phone' ? 'target="_blank"' : ''} 
                           class="text-decoration-none">${value}</a>
                    </div>
                </div>
                <div class="contact-actions">
                    <button class="contact-btn" onclick="editContact('${type}')" title="Edit ${type}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="contact-btn" onclick="copyToClipboard('${value}')" title="Copy ${type}">
                        <i class="fas fa-copy"></i>
                    </button>
                    <button class="contact-btn" onclick="removeContact(${contactIndex})" title="Hapus ${type}">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        `;

        // Insert before the closing div
        const lastContact = container.querySelector('.contact-item:last-of-type');
        if (lastContact) {
            lastContact.insertAdjacentElement('afterend', contactItem);
        } else {
            container.appendChild(contactItem);
        }

        // Add animation
        contactItem.style.opacity = '0';
        contactItem.style.transform = 'translateY(20px)';
        setTimeout(() => {
            contactItem.style.transition = 'all 0.3s ease';
            contactItem.style.opacity = '1';
            contactItem.style.transform = 'translateY(0)';
        }, 10);

        showNotification(`${type} berhasil ditambahkan!`, 'success');
    }

    function removeContact(index) {
        if (!editMode) {
            toggleEditMode();
        }

        if (confirm('Yakin ingin menghapus kontak ini?')) {
            const contactElement = document.getElementById(`contact-${index}`);
            if (contactElement) {
                // Add removal animation
                contactElement.style.transition = 'all 0.3s ease';
                contactElement.style.opacity = '0';
                contactElement.style.transform = 'translateY(-20px)';

                setTimeout(() => {
                    contactElement.remove();
                    showNotification('Kontak berhasil dihapus!', 'success');
                }, 300);
            }
        }
    }

    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            showNotification('Berhasil disalin ke clipboard!', 'success');
        }).catch(() => {
            // Fallback for older browsers
            const textArea = document.createElement('textarea');
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            showNotification('Berhasil disalin ke clipboard!', 'success');
        });
    }

    // Achievements management
    function addAchievement() {
        if (!editMode) {
            toggleEditMode();
        }

        const title = prompt('Judul prestasi:');
        if (!title || !title.trim()) return;

        const year = prompt('Tahun:');
        if (!year || !year.trim()) return;

        const description = prompt('Deskripsi prestasi:');
        if (!description || !description.trim()) return;

        const type = prompt('Jenis prestasi (competition, academic, leadership):');
        if (!type || !type.trim()) return;

        addAchievementToContainer(title.trim(), year.trim(), description.trim(), type.trim());
    }

    function addAchievementToContainer(title, year, description, type) {
        const container = document.getElementById('achievementsContainer');
        const achievementIndex = container.querySelectorAll('.achievement-card').length;

        const iconMap = {
            'competition': 'fas fa-trophy',
            'academic': 'fas fa-medal',
            'leadership': 'fas fa-user-tie',
            'award': 'fas fa-award',
            'certificate': 'fas fa-certificate'
        };

        const icon = iconMap[type.toLowerCase()] || 'fas fa-star';

        // Create column wrapper
        const colDiv = document.createElement('div');
        colDiv.className = 'col-md-6 mb-4';

        const achievementCard = document.createElement('div');
        achievementCard.className = 'achievement-card';
        achievementCard.id = `achievement-${achievementIndex}`;
        achievementCard.innerHTML = `
            <div class="achievement-header">
                <div class="achievement-icon">
                    <i class="${icon}"></i>
                </div>
                <div class="achievement-content">
                    <div class="achievement-title">${title}</div>
                    <div class="achievement-year">${year}</div>
                </div>
            </div>
            <div class="achievement-description">
                ${description}
            </div>
            <div class="achievement-type ${type}">
                ${type}
            </div>
            <div class="achievement-actions">
                <button class="achievement-btn" onclick="editAchievement(${achievementIndex})" title="Edit Prestasi">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="achievement-btn" onclick="removeAchievement(${achievementIndex})" title="Hapus Prestasi">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;

        colDiv.appendChild(achievementCard);

        // Insert before the add button
        const addButton = container.querySelector('.add-achievement-btn');
        container.insertBefore(colDiv, addButton);

        // Add animation
        achievementCard.style.opacity = '0';
        achievementCard.style.transform = 'translateY(20px)';
        setTimeout(() => {
            achievementCard.style.transition = 'all 0.3s ease';
            achievementCard.style.opacity = '1';
            achievementCard.style.transform = 'translateY(0)';
        }, 10);

        showNotification('Prestasi berhasil ditambahkan!', 'success');
    }

    function editAchievement(index) {
        if (!editMode) {
            toggleEditMode();
        }

        const achievementElement = document.getElementById(`achievement-${index}`);
        if (!achievementElement) return;

        const titleElement = achievementElement.querySelector('.achievement-title');
        const yearElement = achievementElement.querySelector('.achievement-year');
        const descElement = achievementElement.querySelector('.achievement-description');
        const typeElement = achievementElement.querySelector('.achievement-type');

        const newTitle = prompt('Edit judul prestasi:', titleElement.textContent);
        if (newTitle && newTitle.trim()) {
            titleElement.textContent = newTitle.trim();
        }

        const newYear = prompt('Edit tahun:', yearElement.textContent);
        if (newYear && newYear.trim()) {
            yearElement.textContent = newYear.trim();
        }

        const newDesc = prompt('Edit deskripsi:', descElement.textContent);
        if (newDesc && newDesc.trim()) {
            descElement.textContent = newDesc.trim();
        }

        const newType = prompt('Edit jenis prestasi (competition, academic, leadership):', typeElement.textContent);
        if (newType && newType.trim()) {
            // Update type class
            typeElement.className = `achievement-type ${newType.trim()}`;
            typeElement.textContent = newType.trim();

            // Update icon based on type
            const iconElement = achievementElement.querySelector('.achievement-icon i');
            const iconMap = {
                'competition': 'fas fa-trophy',
                'academic': 'fas fa-medal',
                'leadership': 'fas fa-user-tie',
                'award': 'fas fa-award',
                'certificate': 'fas fa-certificate'
            };
            const newIcon = iconMap[newType.trim().toLowerCase()] || 'fas fa-star';
            iconElement.className = newIcon;
        }

        showNotification('Prestasi berhasil diupdate!', 'success');
    }

    function removeAchievement(index) {
        if (!editMode) {
            toggleEditMode();
        }

        if (confirm('Yakin ingin menghapus prestasi ini?')) {
            const achievementElement = document.getElementById(`achievement-${index}`);
            if (achievementElement) {
                // Find the parent column div
                const parentCol = achievementElement.closest('.col-md-6');

                // Add removal animation
                if (parentCol) {
                    parentCol.style.transition = 'all 0.3s ease';
                    parentCol.style.opacity = '0';
                    parentCol.style.transform = 'translateY(-20px)';

                    setTimeout(() => {
                        parentCol.remove();
                        showNotification('Prestasi berhasil dihapus!', 'success');
                    }, 300);
                } else {
                    // Fallback if no parent column found
                    achievementElement.style.transition = 'all 0.3s ease';
                    achievementElement.style.opacity = '0';
                    achievementElement.style.transform = 'translateY(-20px)';

                    setTimeout(() => {
                        achievementElement.remove();
                        showNotification('Prestasi berhasil dihapus!', 'success');
                    }, 300);
                }
            }
        }
    }

    // Project management
    function addProject() {
        if (!editMode) {
            toggleEditMode();
        }

        const title = prompt('Judul proyek:');
        if (!title || !title.trim()) return;

        const desc = prompt('Deskripsi proyek:');
        if (!desc || !desc.trim()) return;

        const link = prompt('Link proyek (opsional):') || '#';

        addProjectToContainer(title.trim(), desc.trim(), link);
    }

    function addProjectToContainer(title, desc, link) {
        const container = document.getElementById('projectsContainer');
        const projectIndex = container.children.length;

        const projectDiv = document.createElement('div');
        projectDiv.className = 'col-md-6 mb-4';
        projectDiv.id = `project-${projectIndex}`;
        projectDiv.innerHTML = `
            <div class="card project-card h-100">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h6 class="card-title mb-0" id="project-title-${projectIndex}" onclick="editProjectField(${projectIndex}, 'title')" style="cursor: pointer;">
                            ${title}
                            <i class="fas fa-edit ms-2 text-muted" style="font-size: 0.7em;"></i>
                        </h6>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" onclick="editProject(${projectIndex})">
                                    <i class="fas fa-edit me-2"></i>Edit
                                </a></li>
                                <li><a class="dropdown-item text-danger" href="#" onclick="deleteProject(${projectIndex})">
                                    <i class="fas fa-trash me-2"></i>Hapus
                                </a></li>
                            </ul>
                        </div>
                    </div>
                    <p class="card-text text-muted small flex-grow-1" id="project-desc-${projectIndex}" onclick="editProjectField(${projectIndex}, 'desc')" style="cursor: pointer;">
                        ${desc}
                        <i class="fas fa-edit ms-2 text-muted" style="font-size: 0.7em;"></i>
                    </p>
                    <div class="mt-auto">
                        <div class="d-flex gap-2">
                            <a href="${link}" class="btn btn-sm btn-outline-primary" target="_blank">
                                <i class="fas fa-external-link-alt me-1"></i>Lihat
                            </a>
                            <button class="btn btn-sm btn-outline-warning" onclick="editProject(${projectIndex})">
                                <i class="fas fa-edit me-1"></i>Edit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        container.appendChild(projectDiv);
        updateStats();
    }

    function editProjectField(index, field) {
        if (!editMode) return;

        const element = document.getElementById(`project-${field}-${index}`);
        const currentValue = element.textContent.replace(' ✏️', '').trim();
        const newValue = prompt(`Edit ${field}:`, currentValue);

        if (newValue && newValue.trim() && newValue !== currentValue) {
            element.innerHTML =
                `${newValue.trim()} <i class="fas fa-edit ms-2 text-muted" style="font-size: 0.7em;"></i>`;
        }
    }

    function editProject(index) {
        if (!editMode) return;

        const title = prompt('Edit judul proyek:');
        if (title && title.trim()) {
            const titleElement = document.getElementById(`project-title-${index}`);
            titleElement.innerHTML =
                `${title.trim()} <i class="fas fa-edit ms-2 text-muted" style="font-size: 0.7em;"></i>`;
        }

        const desc = prompt('Edit deskripsi proyek:');
        if (desc && desc.trim()) {
            const descElement = document.getElementById(`project-desc-${index}`);
            descElement.innerHTML =
                `${desc.trim()} <i class="fas fa-edit ms-2 text-muted" style="font-size: 0.7em;"></i>`;
        }
    }

    function deleteProject(index) {
        if (!editMode) return;

        if (confirm('Yakin ingin menghapus proyek ini?')) {
            const projectElement = document.getElementById(`project-${index}`);
            if (projectElement) {
                projectElement.remove();
                updateStats();
            }
        }
    }

    // Update statistics
    function updateStats() {
        const skillCount = document.querySelectorAll('.skill-badge').length;
        const projectCount = document.querySelectorAll('[id^="project-"]').length;

        // Update stats cards if they exist
        const skillStats = document.querySelector('.stats-card h4');
        const projectStats = document.querySelectorAll('.stats-card h4')[1];

        if (skillStats) {
            skillStats.textContent = skillCount;
            // Add pulse animation to stats
            skillStats.style.animation = 'none';
            setTimeout(() => {
                skillStats.style.animation = 'pulsePremium 0.6s ease-in-out';
            }, 10);
        }
        if (projectStats) {
            projectStats.textContent = projectCount;
            // Add pulse animation to stats
            projectStats.style.animation = 'none';
            setTimeout(() => {
                projectStats.style.animation = 'pulsePremium 0.6s ease-in-out';
            }, 10);
        }
    }

    // Save all changes
    function saveChanges() {
        console.log('Saving all changes...');
        // Here you would send all changes to your backend
        showNotification('Perubahan berhasil disimpan!', 'success');
    }

    // Show notification
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
        notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        notification.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.remove();
        }, 3000);
    }

    // Scroll to top
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    // Add smooth scrolling to all links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
    </script>
</body>

</html>