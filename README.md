# <p align="center"> 📖 DIGITAL-BOOKSTORE 📖 </p>

<p align="center">
  <img src="https://img.shields.io/github/license/Amey-Thakur/DIGITAL-BOOKSTORE?style=flat-square&logo=opensourceinitiative&logoColor=white&color=0080ff" alt="License">
  <img src="https://img.shields.io/badge/PHP-7.4+-777BB4?style=flat-square&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/HTML5-E34F26?style=flat-square&logo=html5&logoColor=white" alt="HTML5">
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=flat-square&logo=css3&logoColor=white" alt="CSS3">
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=flat-square&logo=javascript&logoColor=black" alt="JavaScript">
</p>

---

👉🏻 **DIGITAL-BOOKSTORE** is a responsive full-stack e-commerce platform designed to facilitate seamless book discovery and acquisition. Developed as a 6th Semester Mini-Project, it explores the integration of relational databases with dynamic web interfaces. Users can browse extensive catalogs by category or author, utilize intelligent search functionality, and manage their selections through a persistent shopping cart system.

## 👥 Authors

<p align="center">
  <a href="https://github.com/Amey-Thakur">
    <img src="https://img.shields.io/badge/Author-Amey%20Thakur-blue?style=for-the-badge&logo=github" alt="Amey Thakur">
  </a>
  &nbsp;
  <a href="https://github.com/msatmod">
    <img src="https://img.shields.io/badge/Author-Mega%20Satish-pink?style=for-the-badge&logo=github" alt="Mega Satish">
  </a>
</p>

## ✨ Features

| Feature | Description |
| :--- | :--- |
| **Dynamic Catalog** | Real-time book listing with detailed metadata (Author, Edition, Price). |
| **Intelligent Search** | Multi-attribute search across Titles, Authors, and Categories. |
| **Catalog Filtering** | Advanced sorting by Price (Low/High) and Discount metrics. |
| **User Authentication** | Secure member registration and login session management. |
| **Persistent Cart** | Database-backed shopping cart for cross-session state retention. |
| **Interactive Query** | Integrated customer inquiry system with automated mail notifications. |

## 🛠️ Tech Stack

- **Frontend**: HTML5, CSS3, JavaScript, jQuery, Bootstrap 3.3.6
- **Backend**: PHP 7.4+
- **Database**: MySQL 5.7+
- **Dev Environment**: XAMPP (Apache Server)

## 📂 Project Structure

```bash
DIGITAL-BOOKSTORE/
├── docs/                               # Project documentation
│   └── SPECIFICATION.md                # Technical specification
├── Mini Project/                       # Academic assets and research
│   ├── Draft/                          # Preliminary research documents
│   │   └── DIGITAL BOOKSTORE.docx      # Manuscript draft
│   ├── Figures/                        # System diagrams and visualizations
│   │   ├── Database Tables.jpg         # Database schema visualization
│   │   ├── Fig. (1) Process Model.png  # SDLC process model
│   │   ├── Fig. (2) Zero Level DFD.jpg # Data Flow Diagram (Level 0)
│   │   ├── ...                         # UML and architectural diagrams
│   ├── IJRASET-V9I7...pdf              # Published journal article
│   ├── IJRASET36609...pdf              # Publication certificate
│   ├── Preprint...pdf                  # Preprint version of the paper
│   └── Project timeline1.xlsx          # Project management schedule
├── Source Code/                        # Core application source
│   ├── css/                            # Custom and framework stylesheets
│   ├── fonts/                          # Typography and iconography assets
│   ├── img/                            # UI imagery and product thumbnails
│   ├── js/                             # Client-side logic and libraries
│   ├── Author.php                      # Author-specific inventory view
│   ├── bookstore.sql                   # Database initialization script
│   ├── cart.php                        # Cart management and checkout
│   ├── dbconnect.php                   # Database connection module
│   ├── description.php                 # Unit presentation layer
│   ├── index.php                       # Application entry point
│   ├── Product.php                     # Category catalog view
│   ├── query.php                       # Asynchronous query handler
│   └── ...                             # Authentication logic files
├── .gitattributes                      # Git LFS and path configuration
├── .gitignore                          # Version control exclusion rules
├── CITATION.cff                        # Scholarly citation metadata
├── codemeta.json                       # Comprehensive project metadata
├── LICENSE                             # MIT Software License
├── README.md                           # Documentation entry point
└── SECURITY.md                         # Security policy and disclosure
```

## 🚀 Quick Start

### Prerequisites
- [XAMPP](https://www.apachefriends.org/index.html) installed on your local machine.

### Deployment Steps
1. **Repository Setup**: Clone the repository to your `htdocs` directory.
   ```bash
   git clone https://github.com/Amey-Thakur/DIGITAL-BOOKSTORE.git
   ```
2. **Database Initialization**: 
   - Start **Apache** and **MySQL** via XAMPP Control Panel.
   - Navigate to `http://localhost/phpmyadmin`.
   - Create a new database named `digital_bookstore`.
   - Import `Source Code/bookstore.sql` into the newly created database.
3. **Run Application**:
   - Access the platform via `http://localhost/DIGITAL-BOOKSTORE/Source%20Code/index.php`.

## 📜 License

This project is licensed under the **MIT License**. See the [LICENSE](LICENSE) file for details.

---

<div align="center">
  <p><b>👉🏻 Presented as a part of the 6th Semester Mini-Project @ Terna Engineering College 👈🏻</b></p>
  <p>👷 <b>Project Authors:</b> Amey Thakur and Mega Satish (Batch of 2022)</p>
  
  <p>
    <a href="https://github.com/Amey-Thakur/COMPUTER-ENGINEERING"><b>COMPUTER ENGINEERING</b></a>
    &nbsp;·&nbsp;
    <a href="https://github.com/Amey-Thakur/DIGITAL-BOOKSTORE"><b>DIGITAL-BOOKSTORE</b></a>
  </p>
</div>
