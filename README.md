# Mailing-System

A mailing system with a queueing mechanism. This is a small application created on [MVC](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller) pattern.
The system has registered users and standard email templates. You can send selected email template to selected contacts. 
There is a dashboard that allows you to follow the process of the queueing (How many emails are in the queue, how many are in the process to send and how many were olredy sent). 
Also there is a statistic page that shows you whene mails were sent, to whom and how much in total.


## DB Structure 

There are 5 tables in databasa: [View db](https://github.com/GareginDavtyan/Mailing-System/blob/master/mailing.sql)
* `user` - contains list of registered users
* `template` - Simple email templates
* `session` - ամեն անգամ օգտատերերին մեյլ ուղարկելու պահին այս աղյուսակում ավելանում է մեկ տող 
* `mail_queue` - այս աղյուսակում են պահվում user-ների ցանկը, որոնց պետք է մեյլ ուղարկվի
* `mail_sent` - mail-ը օգտատերին ուղարկվելուց հետո ավելանում է այս աղյուսակ


## Application description

Ամեն անգամ օգտատերերի հերթական խմբին մեյլ ուղարկելուց հետո օգտատերերի ցուցակը պահվում է *՝mail_queue՝* աղյուսակում։ 
