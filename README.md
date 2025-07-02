# Limkokwing Bot

A comprehensive Telegram bot system for Limkokwing University students to check exam results and access academic information, complete with a web-based administration panel.

## 🚀 Overview

**Limkokwing Bot** is an online examination result checking system built as a Telegram bot application. It allows students to quickly access their exam results, academic performance, and faculty information without the need to visit the university's student portal website. The system includes both a Telegram bot interface for students and a web-based administration panel for managing student records, faculties, and modules.

## ✨ Features

### 🤖 Telegram Bot Features
- **Exam Result Checking**: Students can check their exam results by entering their student ID
- **Faculty Listing**: View all available faculties with their codes and names
- **Interactive Keyboard Menus**: User-friendly interface with custom keyboards
- **Multi-Faculty Support**: Support for 9 different faculties including:
  - Faculty of Information & Communication Technology
  - Faculty of Architecture & The Built Environment
  - Faculty of Business Management & Globalization
  - Faculty of Communication, Media & Broadcasting
  - Faculty of Design Innovation
  - Faculty of Fashion & Lifestyle Creativity
  - Faculty of Multimedia Creativity
  - Limkokwing Sound & Music Design Academy
  - Postgraduate Centre
- **Student Information Lookup**: Search and display student details
- **Error Handling**: Comprehensive error messages and validation

### 🔧 Web Administration Panel Features
- **Student Management**: Complete CRUD operations for student records
  - Add new student information
  - View detailed student profiles
  - Update existing student data
  - Delete student records
  - Bulk student data management
- **Faculty Management**: Full management of university faculties
  - Create new faculties
  - View faculty details
  - Update faculty information
  - Delete faculties
- **Module Management**: Course module administration
  - Add new modules
  - View module details
  - Update module information
  - Delete modules
- **User Authentication System**:
  - Secure login/logout functionality
  - User registration
  - Password reset functionality
  - Session management
- **Responsive Dashboard**: Bootstrap-based modern interface
- **Data Validation**: Comprehensive input validation and error handling

## 🛠️ Technology Stack

- **Backend**: PHP 7.4+
- **Database**: MySQL 5.7+
- **Bot API**: Telegram Bot API
- **Frontend**: HTML5, CSS3, Bootstrap 3.3.7
- **JavaScript**: jQuery 1.12.4
- **HTTP Client**: cURL for API communications

## 📋 Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- Telegram Bot Token (from [@BotFather](https://t.me/botfather))
- SSL certificate (required for Telegram webhook)

## 🔧 Installation & Setup

### 1. Clone the Repository
```bash
git clone https://github.com/yourusername/limkokwing-bot.git
cd limkokwing-bot
```

### 2. Database Setup
1. Import the database schema:
   ```bash
   unzip web-admin/limkokwingbot.sql.zip
   mysql -u your_username -p your_database < limkokwingbot.sql
   ```

2. Update database configuration in `web-admin/config.php`:
   ```php
   define('DB_SERVER', 'your_host');
   define('DB_USERNAME', 'your_username');
   define('DB_PASSWORD', 'your_password');
   define('DB_NAME', 'your_database');
   ```

### 3. Telegram Bot Configuration
1. Create a new bot with [@BotFather](https://t.me/botfather)
2. Get your bot token
3. Update the bot token in `LimkokwingBot.php`:
   ```php
   define('API_KEY','YOUR_BOT_TOKEN_HERE');
   ```

4. Update database connection in `LimkokwingBot.php`:
   ```php
   $db = mysqli_connect('localhost','username','password','database');
   ```

### 4. Web Server Configuration
1. Upload files to your web server
2. Ensure proper permissions for PHP files
3. Set up SSL certificate (required for Telegram webhooks)

### 5. Set Telegram Webhook
```bash
curl -X POST "https://api.telegram.org/bot{YOUR_BOT_TOKEN}/setWebhook" \
     -d "url=https://yourdomain.com/LimkokwingBot.php"
```

## 📊 Database Schema

### Student Info Table
- `id` - Primary key
- `student_id` - Unique student identifier
- `student_name` - Full name of student
- `course_name` - Program/course name
- `term` - Academic term
- `cgpa` - Cumulative GPA
- `module_code_1` to `module_code_6` - Module codes
- `module_name_1` to `module_name_6` - Module names
- `grade_1` to `grade_6` - Module grades

### Faculty Table
- `id` - Primary key
- `faculty_code` - Faculty code
- `faculty_name` - Faculty name

### Module Table
- `id` - Primary key
- `module_code` - Module code
- `module_name` - Module name
- `credits` - Credit hours

### Users Table (Admin)
- `id` - Primary key
- `username` - Admin username
- `password` - Hashed password
- `created_at` - Registration timestamp

## 🎯 Usage

### For Students (Telegram Bot)
1. Start the bot: `/start`
2. View available commands: `/help`
3. Check exam results: `/examresult`
4. View faculties: `/faculty`
5. Search students: `/student`

### For Administrators (Web Panel)
1. Access the admin panel: `https://yourdomain.com/web-admin/`
2. Login with admin credentials
3. Manage student records, faculties, and modules
4. Monitor system usage and data

## 🔐 Security Features

- **Input Validation**: All user inputs are validated and sanitized
- **SQL Injection Prevention**: Prepared statements used throughout
- **Session Management**: Secure session handling for admin panel
- **Password Hashing**: Admin passwords are properly hashed
- **Access Control**: Authentication required for admin functions

## 📈 Bot Commands

| Command | Description |
|---------|-------------|
| `/start` | Initialize the bot and show welcome message |
| `/help` | Display all available commands |
| `/faculty` | List all university faculties |
| `/examresult` | Check exam results by faculty selection |
| `/student` | View student information |
| `/result {student_id}` | Get specific student's exam results |

## 🚀 Deployment

### Production Deployment
1. Ensure all credentials are properly configured
2. Set up SSL certificate for webhook security
3. Configure web server with proper PHP settings
4. Set up database backups
5. Monitor logs for any issues

### Development Environment
1. Use tools like XAMPP/WAMP for local development
2. Use ngrok for local webhook testing
3. Keep development and production databases separate

## 📝 Project Information

**Timeline**: May 2019 - November 2019  
**Status**: Completed  
**Type**: Final Year Project  
**Client**: Faculty of Information & Communication Technology, Limkokwing University  
**Developer**: Amirtechs  
**Last Updated**: February 2021  

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 📞 Support

For support and inquiries:
- Telegram Channel: [@LimkokwingBotNews](https://t.me/LimkokwingBotNews)
- Contact: [Your Contact Information]

## 🔄 Changelog

### Version 2.0 (February 2021)
- Enhanced web administration panel
- Improved error handling
- Added comprehensive CRUD operations
- Updated security features
- Responsive design improvements

### Version 1.0 (November 2019)
- Initial release
- Basic bot functionality
- Student result checking
- Faculty listing

---

**Note**: This project was developed as a Final Year Project for Limkokwing University. Please ensure you have proper permissions and follow your institution's guidelines when deploying similar systems.
