# LARAJOBS 
![Larajobs](https://github.com/alessflame/larajobs/blob/master/public/larajobs-logo.jpg)


### Backend 
![Laravel](https://laravel.com/img/logotype.min.svg)




I created this project with <b>Laravel</b>.
It's a server for a job ads platform.
You can create your account and easily apply for offers!

<br>
<br>

I used <b>Cloudinary</b>'s cloud service for implement inserting of CV files


# Acknowledgements

- JWTAuth
- Laravel
- Cloudinary

# Deploy

I used <b>Vercel</b> to deploy this Laravel server.
The links to test the server and client

- [Server Test](https://larajobs-alessflame.vercel.app/)
- [Client Test](https://larajobs-react-alessflame.vercel.app/)



## contacts
- [LinkedIn](https://www.linkedin.com/in/francesco-aless) 

- [Start2Impact](https://talent.start2impact.it/profile/francesco-alessi) <img src="https://media.licdn.com/dms/image/C4D0BAQFIIFmsY2N8AA/company-logo_200_200/0/1662538340359?e=2147483647&v=beta&t=3HMmOzu_SPtPOlA2pvS1CGfOJbP-xeBSnc59tgIWhN0" style="width:30px;"/>


## API Reference

local:
```http
http://localhost/api
```

Vercel production:
```http
https://larajobs-alessflame.vercel.app/api/api
```


#### Authentication
###### Register
```http
  POST /authenticate/register
```
| Parameter | Type     | Description   |
| :-------- | :------- | :---------- |
| `username` | `string` | **Required** |
| `email` | `string` | **Required**|
| `password` | `string` | **Required**|

###### Login
```http
  POST /authenticate/login -> return jwt
```
| Parameter | Type     | Description   |
| :-------- | :------- | :---------- |
| `email` | `string` | **Required**|
| `password` | `string` | **Required**|

## Services
#### Route Group:
```http
   /auth
```
| Parameter | Type     | Description   |
| :-------- | :------- | :---------- |
| `Authorization` | `Bearer {token}` | **Required**|


#### Job Ads
```http
  GET /jobs 
```
| Description   |
| :-------- |
| `return all jobs` |

```http
  GET /applications/{id} 
```
| Description   |
| :-------- |
| `return a single job Ad` |


### Applications:
```http
   GET /applications
```
Get all single user's applications thanks your bearer token.
```http
   POST /applications
```
| Parameter | Type     | Description   |
| :-------- | :------- | :---------- |
| `job_ads_id` | `int` | **Required**|
| `letter` | `int` | **Required**|


Store a new application.

```http
   DELETE /applications
```
| Parameter | Type     | Description   |
| :-------- | :------- | :---------- |
| `job_ads_id` | `int` | **Required**|

Delete single application.

### CV:
```http
   GET /cv
```
Get your cv thanks your bearer token.
```http
   POST /cv
```
| Parameter | Type     | Description   |
| :-------- | :------- | :---------- |
| `cvfile` | `file` | **Required**|

Store your cv.
```http
   DELETE /cv
```

Delete your cv.

### logout
```http
  POST /logout
```
logout user




