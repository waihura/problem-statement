# problem statement
Based on my understanding of the problem statement, i'd model the solution as follows:

Different users of the system would have access rights assigned to them via roles, in such that a sales agent from a specific branch would be able to view only his/her lead inputs under the current branch that they are working under.

A branch manager would have access to all leads and products under his/her branch from all the sales agents input in the system.

So branch managers and sales agent will have access to data in their respective branches based on the access rights given.

This will enable report generation based on branches; 
    <ul>
        <li>report showing leads under each branch</li>
        <li>sales agents reports showing their performance</li>
        <li>lead status under each branch</li>
        <li>actual sales</li>
    </ul> 
 
# Installation
Clone this repo.

Run composer install/update

Create a .env file and setup application key and db details

Run php artisan migrate --seed to create roles, permisions and manager account 

>> Manager credentials: Username - manager@example.com  Password - password

npm instal && npm run dev

