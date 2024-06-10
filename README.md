# Donation Management System

This repository contains the implementation of a donation management system designed by Group L for the COMP3013 Database Management System course.

## Project Overview

The donation management system aims to provide an online platform where users can donate to various causes such as poverty relief, disaster recovery, animal welfare, and cultural heritage preservation. The system allows users to browse, donate, and comment on different beneficiaries while administrators manage the content and user interactions.

## Table of Contents

- [Project Overview](#project-overview)
- [Features](#features)
- [ER Diagram](#er-diagram)
- [Database Schema](#database-schema)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)
- [Team](#team)

## Features

### User Features
- **Browse Beneficiaries**: View and search for different beneficiaries categorized as people, religion, animal, plant, and relic.
- **Donation**: Donate to selected beneficiaries using QR codes.
- **Comments**: Post comments on beneficiaries and interact with other users' comments.
- **User Registration and Login**: Secure user authentication and session management.
- **Notifications**: Receive notifications related to new posts and updates.

### Administrator Features
- **Manage Users**: View and control user activities.
- **Verify Beneficiaries**: Approve or reject beneficiary submissions.
- **Edit News**: Post and manage news related to donation activities.
- **Moderate Comments**: Manage user comments including deleting inappropriate content.

## ER Diagram

![ER Diagram](path_to_er_diagram_image)

The ER diagram illustrates the entities involved in the system and their relationships. Key entities include Users, Beneficiaries, Donations, Comments, and Administrators.

## Database Schema

The database schema includes the following tables:
- **Users**: Stores user details.
- **Administrators**: Stores administrator details.
- **Beneficiaries**: Stores details of beneficiaries categorized into people, religion, animal, plant, and relic.
- **Donations**: Records donation transactions.
- **Comments**: Stores user comments on beneficiaries.
- **Notifications**: Stores notifications for users.

Each table is normalized, and foreign keys are used to maintain referential integrity.

## Technologies Used

- **Frontend**: Bootstrap
- **Backend**: PHP
- **Database**: MySQL
- **Session Management**: PHP Sessions

## Installation

To set up the project locally:

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/donation-management-system.git
2. Navigate to the project directory:
   ```bash
   cd donation-management-system
3. Set up the database using the provided SQL scripts.
4. Configure the backend by updating the database connection details in the configuration files.
5. Start your local server and ensure the PHP environment is set up.

## Usage

1. Register as a new user or log in using existing credentials.
2. Browse through the list of beneficiaries.
3. Select a beneficiary to view more details and donate.
4. Post comments on beneficiaries and interact with other users.
5. Administrators can log in using a special link to manage users, beneficiaries, and comments.

License
This project is licensed under the Apache [License](#license). See the LICENSE file for more details.
