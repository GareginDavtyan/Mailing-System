# Mailing-System

A mailing system with a queueing mechanism. 
The system has registered users and standard email templates. You can send selected email template to selected contacts. 
There is a dashboard that allows you to follow the process of the queueing (How many emails are in the queue, how many are in the process to send and how many were olredy sent). 


## DB Structure

There are 5 tables:
* `user` - contains list of registered users
* `template` - Simple email templates
* `session` - ամեն անգամ օգտատերերին մեյլ ուղարկելու պահին այս աղյուսակում ավելանում է մեկ տող 
* `mail_queue` - այս աղյուսակում են պահվում user-ների ցանկը, որոնց պետք է մեյլ ուղարկվի
* `mail_sent` - mail-ը օգտատերին ուղարկվելուց հետո ավելանում է այս աղյուսակ
