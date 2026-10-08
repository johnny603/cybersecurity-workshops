## GitHub Pages

The repository includes a GitHub Pages website that serves as the public-facing documentation and learning platform for the cybersecurity workshops.

The website is inspired by the design and structure of the **2024 SFSU Cybersecurity Club website**, while being adapted specifically for the workshop repository.

The GitHub Pages site is intentionally separated from the Docker-based workshop environments. The website documents and presents the workshops; the Docker environments contain the actual vulnerable applications and services.

### Architecture

```text
cybersecurity-workshops/
│
├── recon/
│   ├── Dockerfile
│   ├── README.md
│   └── www/
│
├── web/
│   ├── docker-compose.yml
│   ├── README.md
│   ├── cmdi/
│   ├── dirtrav/
│   ├── sqli/
│   ├── ssrf/
│   └── templatei/
│
├── docs/                         ← GitHub Pages
│   ├── index.html                ← Home
│   │
│   ├── workshops/
│   │   ├── index.html            ← Workshop catalog
│   │   ├── reconnaissance/
│   │   ├── directory-traversal/
│   │   ├── command-injection/
│   │   ├── ssti/
│   │   ├── ssrf/
│   │   └── sql-injection/
│   │
│   ├── getting-started/
│   │   ├── index.html
│   │   ├── docker.html
│   │   └── tooling.html
│   │
│   ├── about/
│   │   └── index.html
│   │
│   └── assets/
│
└── .github/
    └── workflows/
        └── pages.yml
```

### Website Structure

The Pages site is organized into several sections.

#### Home

```text
/
```

The landing page introduces the project and provides navigation to the workshops.

It should include:

* Project introduction
* Featured workshops
* Getting Started link
* GitHub repository link
* Project purpose
* Cybersecurity-focused visual design

#### Workshops

```text
/workshops/
```

The workshop catalog provides an overview of all available labs.

Each workshop has its own page:

```text
/workshops/reconnaissance/
/workshops/directory-traversal/
/workshops/command-injection/
/workshops/ssti/
/workshops/ssrf/
/workshops/sql-injection/
```

Workshop pages should follow a consistent structure:

```text
Workshop Overview
        ↓
Learning Objectives
        ↓
Prerequisites
        ↓
Setup
        ↓
Reconnaissance
        ↓
Exploitation
        ↓
Understanding the Vulnerability
        ↓
Mitigation
        ↓
Challenge
```

The website provides the instructional material while the corresponding Docker environment provides the hands-on lab.

#### Getting Started

```text
/getting-started/
```

Contains the information required to run the workshops locally.

```text
/getting-started/docker.html
/getting-started/tooling.html
```

Topics include:

* Installing Docker
* Cloning the repository
* Starting a workshop
* Connecting to the lab
* Required cybersecurity tools
* Stopping and resetting the environment

#### About

```text
/about/
```

Provides information about the project, its purpose, intended audience, and relationship to the SFSU Cybersecurity Club.

This section should distinguish between the current workshop repository and the historical 2024 club website rather than presenting the two as the same site.

### Design Direction

The website takes inspiration from the **2024 SFSU Cybersecurity Club website**:

* Dark visual theme
* Terminal-inspired aesthetic
* Monospace typography
* Green/security-oriented accents
* Minimal navigation
* Technical language
* Simple layouts
* Cybersecurity-focused imagery and graphics

The design should retain the character of the original site while providing a more structured experience for navigating and completing workshops.

The goal is not to reproduce the old website exactly. Instead, the old site serves as the visual and organizational reference for the new workshop platform.

### GitHub Pages Deployment

GitHub Pages uses the `docs/` directory as the source for the website.

The GitHub Pages workflow is located at:

```text
.github/workflows/pages.yml
```

The workflow is responsible for deploying the contents of `docs/` to GitHub Pages.

Conceptually:

```text
Git Repository
      │
      ├── recon/ ────── Docker reconnaissance lab
      │
      ├── web/ ──────── Docker web vulnerability labs
      │
      └── docs/ ─────── GitHub Pages website
                           │
                           ▼
                    Public Website
```

The Pages deployment does **not** run the Docker workshops.

Instead:

```text
Website
   │
   │ provides instructions
   ▼
User
   │
   │ clones repository
   ▼
Docker Workshop
   │
   ├── recon/
   └── web/
```

This separation allows the website and workshop environments to be maintained independently.

### Adding a New Workshop

When adding a new workshop, there are two separate components to consider:

1. **Workshop environment**

   * Add the vulnerable application or service.
   * Add the required Docker configuration.
   * Document how to run the environment.
   * Test the environment locally.

2. **GitHub Pages documentation**

   * Add a workshop page under `docs/workshops/`.
   * Add the workshop to the workshop catalog.
   * Document objectives, setup, exploitation, and mitigation.
   * Add navigation links to related workshops.

For example:

```text
New Workshop
     │
     ├── Lab
     │   └── web/new-vulnerability/
     │
     └── Documentation
         └── docs/workshops/new-vulnerability/
```

This keeps the **learning experience** and the **lab implementation** conceptually separate while allowing them to work together as one project.

### Design Principle

> **The Docker directories contain the environments. The `docs/` directory contains the learning experience.**

GitHub Pages should present the workshops, explain the concepts, and guide users through the labs without becoming responsible for running the labs themselves.
