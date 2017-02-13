# Mailing-System

A mailing system with a queueing mechanism. This is a small application created on [MVC](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller) pattern.
The system has registered users and standard email templates. You can send selected email template to selected contacts. 
There is a dashboard that allows you to follow the process of the queueing (How many emails are in the queue, how many are in the process to send and how many were alredy sent). 
Also there is a statistic page that shows you when mails were sent, to whom and how much in total.


## About Interface

UI is created with [Bootstrap framework](http://getbootstrap.com/). There are 4 pages:
* **users** - displays users list in table.
* **templates** - displays email templates list in table.
* **statistic** - Shows statistics about sent mails.
* **queue** - Shows how many messages in queue, in sending process, and how many are sent.


## DB Structure 

There are 5 tables in the databasa: [View db](https://github.com/GareginDavtyan/Mailing-System/blob/master/mailing.sql)
* `user` - contains list of registered users.
* `template` - contains simple email templates.
* `session` - with the help of this table we can separate the mail groups sent different times.
* `mail_queue` - contains email queue.
* `mail_sent` - contains sent mail list.


## How Application Works

[MVC](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller) pattern was used to create this application. There are two folders: **app** and **public**. The **public** folder contains all public files: css, js, etc. The **app** folder contains logic of application.
- In the **users** page we can choose template, select the users and send them email. The application will add selected users in the queue (in the *mail_queue* table: using *id_user* and *id_template* fileds)։
- You need to call [app/cron/sendMailsFromQueue.php](https://github.com/GareginDavtyan/Mailing-System/blob/master/app/cron/sendMailsFromQueue.php) file with cron every *n* minutes
	- The file will select all data from '*mail_queue*' table where '*sending*' field is equal to zero.
	- Аfter selecting rows the '*sending*' field value will be set to 1, to pretend another cron to send message to the same user again.
	- The information about user, after sending message, inserts into "mail_sent" table, where there are only sent mails.
	- If the row is successfully inserted into '*mail_sent*' table, then it will be removed from '*mail_queue*' table.
-So, the *mail_sent* table keeps only sent mails, and the *mail_queue* table only mails in the queue. The information of these two tables are shown on the 'Statistic' and 'Queue' pages.

## Prerequisites

* Apache
* PHP 5>
* MySql 


## Installing

* Download the project.
* Create databasa and export the [mailing.sql](https://github.com/GareginDavtyan/Mailing-System/blob/master/mailing.sql) file in your db.
* Create new folder in your root directory and place both *app* and *public* folders there.


## Running the tests

* Change your databasa connection settings in *app/connectDB.php*.
* The *index.php* file inside *public* folder is the home page.

