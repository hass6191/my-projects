# Quiz Application

## Table of Contents
- [Introduction](#introduction)
- [Installation and Setup](#installation-and-setup)
- [Core Features](#core-features)
- [Additional Features](#additional-features)
- [Critical Analysis of Additional Features](#critical-analysis-of-additional-features)
- [License](#license)

## Introduction
Welcome to the **Quiz Application**, a dynamic and interactive platform designed for quiz enthusiasts! This application allows users to explore a wide range of predefined quizzes, create their own custom quizzes, and track their progress through a gamified XP (Experience Points) system. Built using the powerful **Laravel** framework for the backend and **Vue.js** for the frontend, the Quiz Application emphasizes a user-friendly experience, interactivity, and responsive design to keep users engaged and motivated.

Whether you're looking to test your knowledge, challenge your friends, or create your own quizzes, this application provides a comprehensive solution that caters to all your quiz-related needs.

## Installation and Setup
To set up the Quiz Application locally, follow these detailed steps:

1. **Clone the Repository**  
   Start by cloning the repository from GitHub:
   ```bash
   git clone https://github.com/CHT2520/assignment-2-hass6191.git
   ```

2. **Navigate to the Project Directory**  
   Change into the project directory:
   ```bash
   cd assignment-2-hass6191
   ```

3. **Install PHP Dependencies**  
   Use Composer to install the necessary Laravel dependencies:
   ```bash
   composer install
   ```

4. **Install JavaScript Dependencies**  
   Install Node.js dependencies for managing frontend assets:
   ```bash
   npm install
   ```
   . Run npm build

   ```bash
   npm run build
   ```

6. **Set Environment Variables**  
   Configure the environment file by copying the example file:
   ```bash
   cp .env.example .env
   ```
   Generate the application key to secure your application:
   ```bash
   php artisan key:generate
   ```
   Open the `.env` file in a text editor and update it with your database credentials and any other required configurations, such as mail settings and application URL.

7. **Run Migrations and Seed the Database**  
   To set up the database schema and seed it with initial data, run:
   ```bash
   php artisan migrate

   php artisan migrate --path=/database/migrations/2024_12_19_075839_add_type_to_quizzes_table.php
   php artisan migrate --path=/database/migrations/2024_12_22_130736_create_questions_table.php
   php artisan migrate --path=/database/migrations/2024_12_22_132634_modify_questions_column_in_quizzes_table.php
    php artisan migrate --path=/database/migrations/2024_12_23_162343_create_favorites_table.php
   php artisan migrate --path=/database/migrations/2025_01_08_132537_create_custom_quizzes_table.php
   ```
Seed the Database
```bash
php artisan db:seed --class=PredefinedQuizSeeder
```
7. **Start the Development Server**  
   Finally, launch the application using the built-in PHP server:
   ```bash
   php artisan serve
   ```
   You can now access the application at `http://localhost:8000`.

## Core Features
The Quiz Application comes packed with a variety of core features designed to enhance user experience:

- **Predefined Quizzes**: Users can browse and play quizzes grouped by categories, making it easy to find topics of interest.
- **Custom Quizzes**: Users have the ability to create, edit, and share their quizzes, fostering a community of quiz creators.
- **XP System**: The application tracks user progress with XP points, allowing users to level up and unlock achievements.
- **Achievements**: Users can unlock milestone achievements such as “First Login” or “First Quiz Played,” enhancing user engagement and motivation.
- **Responsive Design**: The application is designed to work seamlessly across all devices, ensuring a consistent user experience.

## Additional Features
In addition to the core features, the Quiz Application includes several additional features that enhance functionality and user engagement:

1. **Enhanced Achievements System**
   - Integrated hover effects and animations for a visually engaging experience.
   - Notable achievements include “First Login,” “First Quiz Played,” and “High Score.”

2. **Advanced Quiz Search and Filters**
   - Users can search quizzes by title or category.
   - Filter quizzes based on visibility (public/private) to streamline the quiz discovery process.

3. **Upcoming Challenges Section**
   - Displays dynamic challenges such as “Complete 3 quizzes to earn a badge.”
   - Keeps users motivated with timely and engaging events that encourage participation.

4. **Dynamic and Interactive UI**
   - Animated cards for achievements and challenges enhance visual appeal.
   - Quiz tables include smooth hover effects and transitions for a more interactive experience.

## Critical Analysis of Additional Features

### Enhanced Achievements System
- **Implementation**: Achievements are visually appealing with animations and tooltips that provide instant feedback to users.
- **Purpose**: This system is designed to provide positive reinforcement for user engagement, encouraging users to explore more quizzes and participate actively.
- **Benefits**: It fosters a sense of accomplishment and encourages consistent user interaction, which can lead to increased retention rates.
- **Limitations**: Some users may prefer a simpler interface without gamification elements, which could lead to confusion or disengagement for those who are not motivated by achievements.

### Advanced Quiz Search and Filters
- **Implementation**: A search bar and dropdown filters have been added to simplify quiz discovery, allowing users to find quizzes that match their
