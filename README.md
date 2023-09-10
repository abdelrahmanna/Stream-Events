
# Problem statement
 This project simulates the events that happens during a video stream: new followers, new subscribers, donations, merch sales.

 ## Criteria:
- user should be able to login using third party authentication (google, facebook, twitch, etc)
- Create a database schema to store the following data
    - followers: should have a name
    - subscribers: should have name and  subscription tier 1/2/3; tier 1: 5$, tier 2: 10$, tier 3: 15$
    - donations: should have name, amount, currency, donation message
    - merch_sales: should have item name, amount, price
- Seed each table with about 300-500 rows of data for each user with creation dates ranging from 3 months ago till now Each of these rows should be able to be marked as read / unread by the user
- Aggregate the data from the above three tables show it to the user once they log in as follows
    - total revenue they made in the past 30 days from donations, subscriptions & merch sales
    - total followers they have gained in the past 30 days
    - top 3 items that did the best sales wise in the past 30 days
    - Use a single list to display this information, format it as a sentence paginated by 100 items per page.


# Solution
## Database

![ERD](https://github.com/abdelrahmanna/Stream-Events/blob/main/dbSchema.png?raw=true)

## API
### Authentication
[Laravel Socialite](https://laravel.com/docs/8.x/socialite) is used to authenticate users with google, facebook, twitch, etc.
<!-- add urls for socialite -->
- `GET auth/{provider}/redirect` - Redirect the user to the authentication page of the provider.
- `GET auth/{provider}/callback` - Handle the callback from the provider after authentication.

Controller: [SocialiteController](https://github.com/abdelrahmanna/Stream-Events/blob/main/app/Http/Controllers/SocialiteController.php)

### Endpoints
#### Events
<!-- add urls for followers -->
- `GET api/events` - Get all events paginated by 100 items per page.
- `GET api/events/{id}` - Get a specific event by id.
- `POST api/events` - Create a new event.
- `PUT api/events/{id}` - Update an existing event.
- `DELETE api/events/{id}` - Delete an existing event.

Controller: [EventController](https://github.com/abdelrahmanna/Stream-Events/blob/main/app/Http/Controllers/EventController.php)

#### Followers
<!-- add urls for followers -->
- `GET api/followers/count` - Get the total number of followers in the past N days.
Controller: [FollowerController](https://github.com/abdelrahmanna/Stream-Events/blob/main/app/Http/Controllers/FollowerController.php)

#### Subscribers
<!-- add urls for subscribers -->
- `GET api/subscribers/revenue` - Get the total revenue from subscribers in the past N days.

Controller: [SubscriberController](https:://github.com/abdelrahmanna/Stream-Events/blob/main/app/Http/Controllers/SubscriberController.php)

#### Donations
<!-- add urls for donations -->
- `GET api/donations/revenue` - Get the total revenue from donations in the past N days.

Controller: [DonationController](https:://github.com/abdelrahmanna/Stream-Events/blob/main/app/Http/Controllers/DonationController.php)

#### Merch Sales
<!-- add urls for merch sales -->
- `GET api/merch-sales/revenue` - Get the total revenue from merch sales in the past N days.
- `GET api/merch-sales/top` - Get top N items that did the best sales wise in the past M days.

Controller: [MerchSaleController](https:://github.com/abdelrahmanna/Stream-Events/blob/main/app/Http/Controllers/MerchSaleController.php)

## Frontend
laravel blade views, vuejs, vuex, ajax, and css were used to implement the client side of the application.