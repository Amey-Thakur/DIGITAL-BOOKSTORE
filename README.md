<div align="center">

  <a name="readme-top"></a>
  # Digital Bookstore

  [![License: MIT](https://img.shields.io/badge/License-MIT-lightgrey)](LICENSE)
  ![Status](https://img.shields.io/badge/Status-Completed-success)
  [![Platform](https://img.shields.io/badge/Platform-PHP%20%7C%20MySQL%20%7C%20Apache-blueviolet)](https://github.com/Amey-Thakur/DIGITAL-BOOKSTORE)
  [![Technology](https://img.shields.io/badge/Technology-PHP%20%7C%20Bootstrap%203%20%7C%20jQuery-orange)](https://github.com/Amey-Thakur/DIGITAL-BOOKSTORE)
  [![Developed by Amey Thakur and Mega Satish](https://img.shields.io/badge/Developed%20by-Amey%20Thakur%20%26%20Mega%20Satish-blue.svg)](https://github.com/Amey-Thakur/DIGITAL-BOOKSTORE)

  A comprehensive web-based e-commerce platform facilitating seamless book discovery, secure user authentication, and persistent shopping cart management.

  **[Source Code](Source%20Code/)** &nbsp;·&nbsp; **[Technical Specification](docs/SPECIFICATION.md)** &nbsp;·&nbsp; **[Video Demo](https://youtu.be/JuUix8olOC8)**

  [![Demo](https://img.youtube.com/vi/JuUix8olOC8/0.jpg)](https://youtu.be/JuUix8olOC8)

</div>

---

<div align="center">

  [Authors](#authors) &nbsp;·&nbsp; [Overview](#overview) &nbsp;·&nbsp; [Features](#features) &nbsp;·&nbsp; [Structure](#project-structure) &nbsp;·&nbsp; [Results](#system-architecture--design-gallery) &nbsp;·&nbsp; [Quick Start](#quick-start) &nbsp;·&nbsp; [Usage Guidelines](#usage-guidelines) &nbsp;·&nbsp; [License](#license) &nbsp;·&nbsp; [About](#about-this-repository) &nbsp;·&nbsp; [Acknowledgments](#acknowledgments)

</div>

---

<!-- AUTHORS -->
<div align="center">

  ## Authors

  **Terna Engineering College | Computer Engineering | Batch of 2022**

  <table>
  <tr>
  <td align="center">
  <a href="https://github.com/Amey-Thakur">
  <img src="https://github.com/Amey-Thakur.png" width="180px;" alt="Amey Thakur"/><br />
  <sub><b>Amey Thakur</b></sub>
  </a><br /><br />
  <a href="https://orcid.org/0000-0001-5644-1575">
  <img src="https://img.shields.io/badge/ORCID-0000--0001--5644--1575-brightgreen" alt="ORCID"/>
  </a>
  </td>
  <td align="center">
  <a href="https://github.com/msatmod">
  <img src="https://raw.githubusercontent.com/Amey-Thakur/DIGITAL-BOOKSTORE/main/Mega/Mega.png" width="180px;" alt="Mega Satish"/><br />
  <sub><b>Mega Satish</b></sub>
  </a><br /><br />
  <a href="https://orcid.org/0000-0002-1844-9557">
  <img src="https://img.shields.io/badge/ORCID-0000--0002--1844--9557-brightgreen" alt="ORCID"/>
  </a>
  </td>
  </tr>
  </table>

  *Special thanks to [Mega Satish](https://github.com/msatmod) for her meaningful contributions, guidance, and support that helped shape this work.*

</div>

---

<!-- OVERVIEW -->
## Overview

The **Digital Bookstore** is a responsive full-stack e-commerce solution developed to facilitate the systematic discovery and acquisition of literary artifacts. It integrates a relational database architecture with a dynamic frontend, providing users with a seamless shopping experience.

Developed as a mini-project for the **Software Engineering Laboratory** curriculum, this system demonstrates the practical application of server-side logic (PHP), database management (MySQL), and responsive UI design (Bootstrap).

> [!IMPORTANT]
> **Research Impact**
>
> This project was published as a research paper in **International Journal for Research in Applied Science and Engineering Technology (IJRASET)** (Volume 9, Issue 7) and is also available as a preprint on **viXra**. The project received an official **Publication Certificate** for its research contribution to software engineering education.
>
> - [Preprint @viXra](https://vixra.org/abs/2108.0142)
> - [Published Paper @IJRASET](https://doi.org/10.22214/ijraset.2021.36609)
> - [Publication Certificate](Mini-Project/IJRASET36609%20-%20Digital%20Bookstore.pdf)

 ### Resources

 | # | Resource | Description | Date | Link |
 |---|---|---|---|---|
 | 1 | **Project Repository** | Complete source code and documentation | May 2021 | [View](Source%20Code/) |
 | 2 | **Project Demo (YouTube)** | Real-time demonstration of features | May 2021 | [View](https://youtu.be/JuUix8olOC8) |
 | 3 | **Project Timeline** | Project execution schedule and milestones | March 2021 | [View](Mini-Project/Amey_B-50_Software_Engineering_Mini_Project_Timeline.pdf) |
 | 4 | **Publication Certificate** | Recognition for project excellence | July 2021 | [View](Mini-Project/IJRASET36609%20-%20Digital%20Bookstore.pdf) |
 | 5 | **Project Diagrams & Plan** | Raw work diagrams planning for digital bookstore project | May 2021 | [View](Mini-Project/Figures/) |

> [!TIP]
> **Database Interaction Efficiency**
>
> To optimize search responsiveness and prevent SQL bottlenecks, ensure that the `books` table is indexed on `book_title` and `author_name`. This significantly enhances retrieval speeds during high-concurrency discovery operations in the storefront.

---

<!-- FEATURES -->
## Features

| Feature | Description |
|---------|-------------|
| **Dynamic Catalog** | Real-time browsable inventory comprising diverse literary categories and author collections with high-resolution visual assets. |
| **Intelligent Search** | Advanced query engine supporting multi-attribute filtering by title, author, and category for efficient discovery. |
| **Authentication System** | Secure user enrollment and session management, providing personalized access to library resources and cart state. |
| **Persistent Cart** | Database-backed shopping cart facilitating cross-session persistence of selected artifacts and real-time total calculation. |
| **Sorting & Filtering** | Precision controls for organizing results based on price metrics (Low-to-High) and discount percentages. |
| **Institutional Inquiries** | Integrated communication portal for dispatching technical or research queries to administrative staff via SMTP. |

### Tech Stack
- **Language**: PHP 7.x+ (Procedural)
- **Database**: MySQL 5.x+
- **Frontend**: HTML5, CSS3, Bootstrap 3.3.6, jQuery
- **Server**: Apache (XAMPP/WAMP)

---

<!-- STRUCTURE -->
## Project Structure

```bash
DIGITAL-BOOKSTORE/
│
├── docs/                                                         # Formal Documentation
│   └── SPECIFICATION.md                                          # Technical Architecture & Spec
│
├── Mega/                                                         # Media & Identity Assets
│   ├── Filly.jpg                                                 # Project-related Content Asset
│   ├── Mega.png                                                  # Author Profile Image (Mega Satish)
│   ├── Mega_Chair.png                                            # Author Profile Context
│   ├── Mega_Dining.jpg                                           # Author Personal Context
│   ├── Mega_Professional.jpg                                     # Author Professional Portrait
│   └── Mega_and_Hetvi.png                                        # Collaborative Identity Asset
│
├── Mini-Project/                                                 # Research & Academic Assets
│   ├── Draft/                                                    # Preliminary Research Data
│   │   └── DIGITAL BOOKSTORE.docx                                # Working Manuscript Draft
│   ├── Figures/                                                  # System Diagrams & Visualizations
│   │   ├── Database Tables.jpg                                   # Relational Schema Visualization
│   │   ├── Fig. (1) Process Model.png                            # SDLC Process Representation
│   │   ├── Fig. (2) Zero Level DFD.jpg                           # Context Level Data Flow Diagram
│   │   ├── Fig. (3) First Level DFD.jpg                          # Level 1 Data Flow Diagram
│   │   ├── Fig. (4) Second Level DFD.jpg                         # Level 2 Data Flow Diagram
│   │   ├── Fig. (5) Class Diagram.jpg                             # Object-Oriented Class Hierarchy
│   │   ├── Fig. (6) Sequence Diagram.jpg                          # System Interaction Timeline
│   │   ├── Fig. (7) Collaboration Diagram.jpg                    # Object Communication Model
│   │   ├── Fig. (8) Statechart Diagram.jpg                       # Entity State Transitions
│   │   ├── Fig. (9) Activity Diagram.jpg                         # Operational Logic Workflow
│   │   ├── Fig. (10) Gantt Chart.jpg                             # Project Scheduling & Milestones
│   │   ├── Fig. (11) Use Case Diagram.jpg                        # Actor-System Interaction Model
│   │   └── Fig. (12) Flow Graph.jpg                              # Algorithmic Complexity Graph
│   ├── Amey_B-50_Software_Engineering_Mini_Project_Timeline.pdf  # Project Execution Schedule
│   ├── IJRASET-V9I7 - Digital Bookstore.pdf                      # Published Journal Research Paper
│   ├── IJRASET36609 - Digital Bookstore.pdf                      # Publication Certificate
│   └── Preprint - Digital Bookstore.pdf                          # Scholarly preprint version (viXra)
│
├── Source Code/                                                  # Full Stack Web Application
│   ├── css/                                                      # Presentation Layer Stylesheets
│   │   ├── bootstrap-theme.css                                   # Supplemental Bootstrap Styling
│   │   ├── bootstrap.css                                         # Core Bootstrap CSS Framework
│   │   ├── my.css                                                # Custom Scholarly UI Styling
│   │   └── ...                                                   # Mapping & Minified CSS Assets
│   ├── fonts/                                                    # Typography & Iconography Assets
│   │   ├── glyphicons-halflings-regular.eot                      # Halflings EOT Asset
│   │   ├── glyphicons-halflings-regular.svg                      # Halflings SVG Asset
│   │   ├── glyphicons-halflings-regular.ttf                      # Halflings TTF Asset
│   │   ├── glyphicons-halflings-regular.woff                     # Halflings WOFF Asset
│   │   └── glyphicons-halflings-regular.woff2                    # Halflings WOFF2 Asset
│   ├── img/                                                      # UI Imagery & Inventory Assets
│   │   ├── books/                                                # Product Metadata Imagery
│   │   ├── carousel/                                             # Landing Page Visual Assets
│   │   ├── new/                                                  # Recent Acquisition Thumbnails
│   │   ├── offers/                                               # Promotional Campaign Imagery
│   │   ├── popular-author/                                       # Contributor Identity Assets
│   │   ├── social/                                               # Institutional Media Icons
│   │   ├── logo.jpg                                              # Platform Identity Logo
│   │   ├── orange-flag.png                                       # UI Notification Component
│   │   └── tag.png                                               # Metadata Taxonomy Icon
│   ├── js/                                                       # Client-Side Logic & Libraries
│   │   ├── bootstrap.js                                          # Bootstrap Interface Logic
│   │   ├── bootstrap.min.js                                      # Minified Interface Logic
│   │   └── npm.js                                                # Node Package Entry Point
│   ├── Author.php                                                # Contributor-Specific Discovery
│   ├── Product.php                                               # Taxonomy-Based Inventory View
│   ├── Result.php                                                # Search Orchestration Layer
│   ├── bookstore.sql                                             # Relational Database Schema
│   ├── cart.php                                                  # Shopping Cart Persistence
│   ├── dbconnect.php                                             # Database Connection Liaison
│   ├── description.php                                           # Artifact Detailed Presentation
│   ├── destroy.php                                               # Session Lifecycle Termination
│   ├── index.php                                                 # Application Entry Gateway
│   ├── login.php                                                 # Identity Authentication Logic
│   ├── query.php                                                 # Inquiry Dispatch Pipeline
│   └── register.php                                              # User Identity Provisioning
│
├── .gitattributes                                                # Global Git LFS & Endpoint Config
├── .gitignore                                                    # Asset Exclusion Manifest
├── CITATION.cff                                                  # Scholarly Citation Metadata
├── codemeta.json                                                 # Machine-Readable Project Metadata
├── LICENSE                                                       # Project Licensing Terms (MIT)
├── README.md                                                     # Comprehensive Archival Entrance
└── SECURITY.md                                                   # Vulnerability Exposure Policy
```

---

<!-- RESULTS -->
## System Architecture & Design Gallery

<div align="center">

  ### Process Model (SDLC)
  ![Process Model](Mini-Project/Figures/Fig.%20(1)%20Process%20Model.png)

  ### Context Level Data Flow Diagram (Zero Level DFD)
  ![Zero Level DFD](Mini-Project/Figures/Fig.%20(2)%20Zero%20Level%20DFD.jpg)

  ### First Level Data Flow Diagram (Level 1 DFD)
  ![First Level DFD](Mini-Project/Figures/Fig.%20(3)%20First%20Level%20DFD.jpg)

  ### Second Level Data Flow Diagram (Level 2 DFD)
  ![Second Level DFD](Mini-Project/Figures/Fig.%20(4)%20Second%20Level%20DFD.jpg)

  ### Class Diagram
  ![Class Diagram](Mini-Project/Figures/Fig.%20(5)%20Class%20Diagram.jpg)

  ### Sequence Diagram
  ![Sequence Diagram](Mini-Project/Figures/Fig.%20(6)%20Sequence%20Diagram.jpg)

  ### Collaboration Diagram
  ![Collaboration Diagram](Mini-Project/Figures/Fig.%20(7)%20Collaboration%20Diagram.jpg)

  ### Statechart Diagram
  ![Statechart Diagram](Mini-Project/Figures/Fig.%20(8)%20Statechart%20Diagram.jpg)

  ### Activity Diagram
  ![Activity Diagram](Mini-Project/Figures/Fig.%20(9)%20Activity%20Diagram.jpg)

  ### Project Scheduling (Gantt Chart)
  ![Gantt Chart](Mini-Project/Figures/Fig.%20(10)%20Gantt%20Chart.jpg)

  ### Use Case Diagram
  ![Use Case Diagram](Mini-Project/Figures/Fig.%20(11)%20Use%20Case%20Diagram.jpg)

  ### Algorithmic Complexity (Flow Graph)
  ![Flow Graph](Mini-Project/Figures/Fig.%20(12)%20Flow%20Graph.jpg)

  ### Relational Schema (Database Tables)
  ![Database Tables](Mini-Project/Figures/Database%20Tables.jpg)

</div>

---

<!-- QUICK START -->
## Quick Start

### 1. Prerequisites
Ensure your local development environment meets the following requirements:
- **Web Server**: Apache (via [XAMPP](https://www.apachefriends.org/index.html) or [WAMP](http://www.wampserver.com/en/)).
- **PHP**: Version **7.x** or higher.
- **Database**: MySQL **5.x** or higher.
- **Browser**: Current production-grade web browser (Chrome, Firefox, Safari).

> [!WARNING]
> **Legacy Dependencies & Security**
>
> This system is built using **PHP 7.x** and **Bootstrap 3**. For stable execution and educational reference, it is recommended to run this in a controlled local environment (e.g., XAMPP/WAMP) to align with the baseline server-side scripting and frontend framework requirements.

### 2. Setup & Deployment
1.  **Clone the Repository**:
    ```bash
    git clone https://github.com/Amey-Thakur/DIGITAL-BOOKSTORE.git
    ```
2.  **Deploy Source Code**:
    -   Locate the `Source Code` directory.
    -   Transfer the **entire contents** of `Source Code` to your server's deployment directory (e.g., `C:\xampp\htdocs\digital-bookstore\`).

### 3. Database Initialization
1.  **Start Services**: Launch Apache and MySQL via your environment control panel.
2.  **Access phpMyAdmin**: Navigate to `http://localhost/phpmyadmin/`.
3.  **Create Database**:
    -   Identifier: `digital_bookstore`
    -   Collation: `utf8_general_ci`
4.  **Import Schema**:
    -   Select the `digital_bookstore` database.
    -   Import the `Source Code/bookstore.sql` script into the repository.

### 4. Configuration
Update the database connection parameters in `Source Code/dbconnect.php` to match your local credentials.

```php
$con = mysqli_connect("localhost", "root", "", "digital_bookstore");
```

### 5. Launch
Access the platform via your local gateway: [http://localhost/digital-bookstore/](http://localhost/digital-bookstore/)

---

<!-- =========================================================================================
                                     USAGE SECTION
     ========================================================================================= -->
## Usage Guidelines

This repository is openly shared to support learning and knowledge exchange across the academic community.

**For Students**  
Use this mini-project as a reference for understanding full-stack e-commerce development, relational database integration with PHP/MySQL, and responsive UI design principles. The source code and research assets are documented to support self-paced learning and exploration of scalable web applications.

**For Educators**  
This project may serve as a practical example or supplementary teaching resource for Software Engineering courses (`CSC601` & `CSL601`). Attribution is appreciated when utilizing content.

**For Researchers**  
The published paper and preprint provide insights into the system's architecture, the application of software engineering methodologies in e-commerce, and the researchers' approach to developing persistent digital marketplaces.

---

<!-- LICENSE -->
## License

This repository and all linked academic content are made available under the **MIT License**. See the [LICENSE](LICENSE) file for complete terms.

> [!NOTE]
> **Summary**: You are free to share and adapt this content for any purpose, even commercially, as long as you provide appropriate attribution to the original author.

Copyright © 2021 Amey Thakur, Mega Satish

---

<!-- ABOUT -->
## About This Repository

**Created & Maintained by**: [Amey Thakur](https://github.com/Amey-Thakur) & [Mega Satish](https://github.com/msatmod)  
**Academic Journey**: Bachelor of Engineering in Computer Engineering (2018-2022)  
**Institution**: [Terna Engineering College](https://ternaengg.ac.in/), Navi Mumbai  
**University**: [University of Mumbai](https://mu.ac.in/)

This project features the **Digital Bookstore**, a web-based e-commerce utility developed as a **6th Semester Mini-Project**. It explores the synergy between dynamic web interfaces and relational data management in a commercial context.

**Connect**: [GitHub](https://github.com/Amey-Thakur) · [LinkedIn](https://www.linkedin.com/in/amey-thakur) · [ORCID](https://orcid.org/0000-0001-5644-1575)

### Acknowledgments

Grateful acknowledgment to **[Mega Satish](https://github.com/msatmod)** for her pivotal role and collaborative excellence during the development of this project. Her intellectual contributions, technical insights, and dedicated commitment to software quality were fundamental in achieving the system's analytical and functional objectives. This technical record serves as a testament to her scholarly partnership and significant impact on the final implementation.

Special thanks to the faculty members of the Department of Computer Engineering at Terna Engineering College for their guidance during the course of this project. Gratitude is also extended to the mentors and peers who supported this learning endeavor.

---

<!-- FOOTER -->
<div align="center">

  [↑ Back to Top](#readme-top)

  [Authors](#authors) &nbsp;·&nbsp; [Overview](#overview) &nbsp;·&nbsp; [Features](#features) &nbsp;·&nbsp; [Structure](#project-structure) &nbsp;·&nbsp; [Results](#system-architecture--design-gallery) &nbsp;·&nbsp; [Quick Start](#quick-start) &nbsp;·&nbsp; [Usage Guidelines](#usage-guidelines) &nbsp;·&nbsp; [License](#license) &nbsp;·&nbsp; [About](#about-this-repository) &nbsp;·&nbsp; [Acknowledgments](#acknowledgments)

  <br>

  🔬 **[Software Engineering Laboratory](https://github.com/Amey-Thakur/SOFTWARE-ENGINEERING-AND-SOFTWARE-ENGINEERING-LAB)** &nbsp;·&nbsp; 📚 **[Digital Bookstore](https://github.com/Amey-Thakur/DIGITAL-BOOKSTORE)**

  ---

  ### Presented as part of the 6th Semester Mini-Project @ Terna Engineering College

  ### 🎓 [Computer Engineering Repository](https://github.com/Amey-Thakur/COMPUTER-ENGINEERING)

  **Computer Engineering (B.E.) - University of Mumbai**

  *Semester-wise curriculum, laboratories, projects, and academic notes.*

</div>
