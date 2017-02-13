# Mailing-System

A mailing system with a queueing mechanism. This is a small application created on [MVC](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller) pattern.
The system has registered users and standard email templates. You can send selected email template to selected contacts. 
There is a dashboard that allows you to follow the process of the queueing (How many emails are in the queue, how many are in the process to send and how many were olredy sent). 
Also there is a statistic page that shows you whene mails were sent, to whom and how much in total.


## About Interface

ՈՒնի պարզ ինտերֆեյս՝ ստեղծված [bootstrap framework](http://getbootstrap.com/)-ի միջոցով և բաղկացած է 4 էջից։
* **users** - այս էջում աղյուսակի տեսքով պատկերված է օգտատերեի ցուցակը։ Կարելի է ընտրել մեկ կամ միքանի օգտատերերի և ուղարկել նրանց մեր ընտրած թեմփլեյթը մեյլի միջոցով։
* **templates** - աղյուսակի տեսքով արտապատկերում է մեյլ ուղարկելու համար նախատեսված template-ներիժը
* **statistic** - ստատիստիկ տվյալներ է պարունակում ուղարկված մեյլերի մասին
* **queue** - աղյուսակի տեսքով պատկերում է, թե քանի մեյլ կա հերթի մեջ, քանիսն է այս պահին ուղարկման փուլում և քանիսն է արդեն ուղարկվել։


## DB Structure 

There are 5 tables in databasa: [View db](https://github.com/GareginDavtyan/Mailing-System/blob/master/mailing.sql)
* `user` - contains list of registered users
* `template` - Simple email templates
* `session` - ամեն անգամ օգտատերերին մեյլ ուղարկելու պահին այս աղյուսակում ավելանում է մեկ տող 
* `mail_queue` - այս աղյուսակում են պահվում user-ների ցանկը, որոնց պետք է մեյլ ուղարկվի
* `mail_sent` - mail-ը օգտատերին ուղարկվելուց հետո ավելանում է այս աղյուսակ


## How Application Works

**users** էջի միջոցով կարելի է ընտրել template-ը, նշել թե որ օգտատերերին է անհրաժեշտ մեյլ ուղարկել և սեղմել **Send mail** կոճակը։ 

- Համակարգը այդ նշված օգտատերերի ցանկը կավելացնեի հերթի մեջ՝ (*`mail_queue`* աղյուսակում  *`id_user`*, *`id_template`* կոմբինացիայի միջոցով)։

- [app/cron/sendMailsFromQueue.php](https://github.com/GareginDavtyan/Mailing-System/blob/master/app/cron/sendMailsFromQueue.php) ֆայլը անհրաժեշտ է աշխատենել cron-ի միջոցով n րոպեն մեկ։ 
	- Այդ ֆայլը ընտրում է *`mail_queue`* աղյուսակի բոլոր այն տողերը, որոնք այդ պահին սպասում են հերթում (**WHERE** *`sending`*=0): 
	- Ընտրելուց հետո ընտրված տողերի *`sending`* սյան արժեքը դարձնում է 1, որպեսզի զուգահեռաբար աշխատող cron ֆայլը չփորձի երկրորդ անգամ մեյլ ուղարկել միևնույն օգտատերին
	- օգտատերին մեյլ ուղարկելուց հետո այդ օգտատերի մասին ինֆորմացիան ավելացնում է *`mail_sent`* աղյուսակի մեջ, որտեղպահվում են միայն ուղարկված մեյլերը։
	- եթե տողը նորմալ ավելացել է *`mail_sent`* աղյուսակ, ապա այն ջնջվում է *`mail_queue`* աղյուսակի։
 