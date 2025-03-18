# **HandigNGT**

This document serves as a guide to facilitate the transition of system maintenance and future development for the Team 13 system to the incoming team, ensuring a smooth handover of responsibilities and essential information.

# **Tasks**

Project name: HandigNGT

**Description**

The backend of HandigNGT is developed by team13 CMGT. HandigNGT is a signlanguage app similar to duolingo, where users can learn different languages through assignments. This project is responsible for the core functionality, such as:

\-Login with HR account

\-The assignments (Words, Sentence building and Fill in the blanks)

\-Progression, streaks and achievements

\-Admin functionalities (adding students)

**Current status**

The backend is fully functional, built with Laravel 12, PHP 8.2 and mongoDB. However, there are still ongoing tasks, such as:

\-CRUD for the assignment

\-View which assignments were done incorrectly

These functions must be made when the frontend team catches up.

The new team will be responsible for:

\-Maintaining the backend

\-Implementing new features

\-Adressing bugs

\-Measuring security

#

# **Handover overview**

**Project Documentation:**

API documentation:
[API documentation](APIDOCUMENTATION.md)
Database scheme:
<https://drawsql.app/teams/team-2415/diagrams/copy-of-copy-of-dovelingo>
\-Laravel version 12

\-PHP version 12

\-MongoDB

**Developement enviroment:**

Clone the repository and run composer install. Afterwards, run php artisan migrate, delete the database and import the database.

**Access credentials:**

Github repository: <https://github.com/ThijsKraaijenbos/Dovelingo-API.git>

Create account for api-key: <http://127.0.0.1:8000/api-user/register>

Check api-key to access database: <http://127.0.0.1:8000/api-user/check-token>

# **Important contacts**

Alana le Ferber, assignments & progression: <1005674@hr.nl>

Hidde Scheringa, assignments & badges: <1076284@hr.nl>

Thijs Kraaijenbos, Server setup, login, database & api: <1073096@hr.nl>

Mick Breijer,: <1054102@hr.nl>

Yosei Saito, get requests & admin page: [1079160@hr.nl](mailto:1079160@hr.nl)

# **Outstanding Issues**

CRUD for assignments must be made

\-Unable to track incorrect answers

**Lessons Learned**

Frontend-backend teamwork is crucial**:** Regular meetings (every few days) help ensure both teams stay aligned and avoid miscommunication.

### **Responsibility Handover**

The HandigNGT backend has been fully handed over to the new team. All documentation, access credentials, and relevant information have been provided.

Handover date: \_**\_**\_**\_**\_**\_**
