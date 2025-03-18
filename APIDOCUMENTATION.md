### **Update user points**

Post /api/v1/update-points

**Description:** Updates users points based on achievements

**Body:**

**{**

**"token": "e6906c7c09b620f53ce0c64606066b6c39028cd2bad7c87f39fa8722ca982fc5",**

**"user_id": 1,**

**"score": "100"**

**}**

**Response:**

**{**

**"message": "Punten bijgewerkt",**

**"total_points": 100,**

**"new_badges": \[**

**"Trophy-0",**

**"Trophy-1",**

**"Trophy-2",**

**"Trophy-3",**

**"Trophy-4",**

**"Trophy-5",**

**"Trophy-6",**

**"Trophy-7"**

**\]**

**}**

### **Get users**

Get /api/v1/users

**Description:** Retrieves a list of all users

**Response:**

{

"id": 1,

"display_name": "Saito",

"full_name": "Saito, Y. (1079160)",

"email": "<1079160@hr.nl>",

"sso_token": "e6906c7c09b620f53ce0c64606066b6c39028cd2bad7c87f39fa8722ca982fc5",

"email_verified_at": **null**,

"role": "student",

"score": 0,

"created_at": "2025-03-17T09:55:33.000000Z",

"updated_at": "2025-03-18T09:48:16.000000Z",

"streak": 3,

"last_login": "2025-03-18 00:00:00"

}

### **Update user**

Post /api/v1/users

**Description:** Updates users

**Body:**

**{**

**"token": "e6906c7c09b620f53ce0c64606066b6c39028cd2bad7c87f39fa8722ca982fc5",**

**"display_name": "aaaaaaa"**

**}**

**Response:**

{

"id": 1,

"display_name": "aaaaaaa",

"full_name": "Saito, Y. (1079160)",

"email": "<1079160@hr.nl>",

"sso_token": "e6906c7c09b620f53ce0c64606066b6c39028cd2bad7c87f39fa8722ca982fc5",

"email_verified_at": **null**,

"role": "student",

"score": 0,

"created_at": "2025-03-17T09:55:33.000000Z",

"updated_at": "2025-03-18T10:16:34.000000Z",

"streak": 3,

"last_login": "2025-03-18 00:00:00"

}

### **Get user badges**

Get /api/v1/user/badges?sso_token=e6906c7c09b620f53ce0c64606066b6c39028cd2bad7c87f39fa8722ca982fc5

**Description:** Retrieves a list of badges earned by the user

**Response:**

**{**

**"user_id": 1,**

**"badges":\[**

**{**

**"id": 5,**

**"title": "Trophy-0",**

**"image_url": "<http://localhost/storage/letter-img/Trophy-0.png>",**

**"required_score": 0,**

**"created_at": "2025-03-11T12:53:45.000000Z",**

**"updated_at": "2025-03-11T12:53:45.000000Z"**

**},**

**{**

**"id": 6,**

**"title": "Trophy-1",**

**"image_url": "<http://localhost/storage/letter-img/Trophy-1.png>",**

**"required_score": 1,**

**"created_at": "2025-03-11T12:53:59.000000Z",**

**"updated_at": "2025-03-11T12:53:59.000000Z"**

**},**

**\]**

**}**

### **Get all badges**

Get /api/v1/badges

**Description:** Retrieves a list of all badges

**Response:**

**{**

**"id": 5,**

**"title": "Trophy-0",**

**"image_url": “/storage/letter-img/Trophy-0.png",**

**"required_score": 0,**

**"created_at": "2025-03-11T12:53:45.000000Z",**

**"updated_at": "2025-03-11T12:53:45.000000Z"**

**}**

### **Get all lessons**

Get /api/v1/lessons

**Description:** Retrieves a list of all available lessons

**Response:**

**{**

**"id": 1,**

**"lesson_name": "Les 1",**

**"created_at": null,**

**"updated_at": null**

**},**

### **Get all words**

Get /api/v1/words

**Description:** Retrieves a list of all available lessons

**Response:**

**{**

**"id": 12,**

**"title": "Aanwezig",**

**"video_path": "<http://localhost/storage/exercise-videos/words/Aanwezig.mp4>",**

**"lesson_id": 1,**

**"created_at": "2025-03-09T09:07:51.000000Z",**

**"updated_at": "2025-03-09T09:07:51.000000Z"**

**},**

### **Get all sentences**

Get /api/v1/sentence-building

**Description:** Retrieves a list of all sentence buildings

**Response:**

{

"id": 1,

"full_sentence": "Wie is dat",

"video_path": "<http://localhost/storage/exercise-videos/sentence-building/Wie> is dat.mp4",

"lesson_id": 1,

"created_at": "2025-03-10T13:22:32.000000Z",

"updated_at": "2025-03-10T13:22:32.000000Z"

},

### **Get all fill in the blanks**

Get /api/v1/fill-in-the-blanks

**Description:** Retrieves a list of all fill in the blanks

**Response:**

**{**

**"id": 7,**

**"full_sentence": "Ik moest 2 uur lang wachten",**

**"video_path": "<http://localhost/storage/exercise-videos/fill-in-the-blanks/Ik> moest 2 uur lang wachten.mp4",**

**"missing_words": "\[\\"2\]",**

**"lesson_id": 4,**

**"created_at": "2025-03-10T13:41:50.000000Z",**

**"updated_at": "2025-03-10T13:41:50.000000Z"**

**},**

### **Get all gifs**

Get /api/v1/gifs

**Description:** Retrieves a list of all gifs

**Response:**

**{**

**"id": 1,**

**"name": "close",**

**"gif_path": "<http://localhost/storage/gifs/close.gif>",**

**"created_at": null,**

**"updated_at": null**

**},**

### **Get all alphabet letters**

Get /api/v1/alphabet-letters

**Description:** Retrieves a list of all alphabet letters

**Response:**

**{**

**"id": 3,**

**"sign": "<http://localhost/storage/letter-img/a.png>",**

**"letter": "a",**

**"created_at": "2025-03-10T13:49:11.000000Z",**

**"updated_at": "2025-03-10T13:49:11.000000Z"**

**},**

### **Get user alphabet letters**

Get /api/v1/user/alphabet-letters?sso_token=e6906c7c09b620f53ce0c64606066b6c39028cd2bad7c87f39fa8722ca982fc5

**Description:** Retrieves a list of all user alphabet letters

**Response:**

**\[**

**"This user has not made any alphabet letters exercises yet"**

**\]**

### **Update user alphabet letters**

Post /api/v1/user/alphabet-letters?sso_token=e6906c7c09b620f53ce0c64606066b6c39028cd2bad7c87f39fa8722ca982fc5

**Description:** Updates user alphabet letters

**Body: {**

**"token": "e6906c7c09b620f53ce0c64606066b6c39028cd2bad7c87f39fa8722ca982fc5",**

**"user_id": 1,**

**"alphabet_letter_id": 3,**

**"completed": 3**

**}**

**Response:**

**\[**

**{**

**"id": 1,**

**"user_id": 1,**

**"alphabet_letter_id": 3,**

**"completed": 3,**

**"created_at": "2025-03-18T10:49:20.000000Z",**

**"updated_at": "2025-03-18T10:49:20.000000Z",**

**"alphabet_letter": {**

**"id": 3,**

**"sign": "letter-img/a.png",**

**"letter": "a",**

**"created_at": "2025-03-10T13:49:11.000000Z",**

**"updated_at": "2025-03-10T13:49:11.000000Z"**

**}**

**},**

**{**

**"id": 2,**

**"user_id": 1,**

**"alphabet_letter_id": 3,**

**"completed": 3,**

**"created_at": "2025-03-18T10:49:39.000000Z",**

**"updated_at": "2025-03-18T10:49:39.000000Z",**

**"alphabet_letter": {**

**"id": 3,**

**"sign": "letter-img/a.png",**

**"letter": "a",**

**"created_at": "2025-03-10T13:49:11.000000Z",**

**"updated_at": "2025-03-10T13:49:11.000000Z"**

**}**

**}**

**\]**

### **Get user words**

Get /api/v1/user/words?sso_token=e6906c7c09b620f53ce0c64606066b6c39028cd2bad7c87f39fa8722ca982fc5

**Description:** Retrieves a list of all user words

**Response:**

**\[**

**"This user has not made any word exercises yet"**

**\]**

### **Update user words**

Post /api/v1/user/words?sso_token=e6906c7c09b620f53ce0c64606066b6c39028cd2bad7c87f39fa8722ca982fc5

**Description:** Updates user words

**Body:**

**{**

**"token": "e6906c7c09b620f53ce0c64606066b6c39028cd2bad7c87f39fa8722ca982fc5",**

**"user_id": 1,**

**"word_id": 12,**

**"completed": 3,**

**}**

**Response:**

**\[**

**{**

**"id": 1,**

**"user_id": 1,**

**"word_id": 12,**

**"completed": 3,**

**"created_at": "2025-03-18T10:53:28.000000Z",**

**"updated_at": "2025-03-18T10:53:28.000000Z",**

**"word": {**

**"id": 12,**

**"title": "Aanwezig",**

**"video_path": "exercise-videos/words/Aanwezig.mp4",**

**"lesson_id": 1,**

**"created_at": "2025-03-09T09:07:51.000000Z",**

**"updated_at": "2025-03-09T09:07:51.000000Z"**

**}**

**}**

**\]**

### **Get user fill-in-the-blanks**

Get /api/v1/user/fill-in-the-blanks?sso_token=e6906c7c09b620f53ce0c64606066b6c39028cd2bad7c87f39fa8722ca982fc5

**Description:** Retrieves a list of all user fill-in-the-blanks

**Response:**

**\[**

**"This user has not made any fill in the blanks exercises yet"**

**\]**

### **Update user fill-in-the-blanks**

Post /api/v1/user/fill-in-the-blanks?sso_token=e6906c7c09b620f53ce0c64606066b6c39028cd2bad7c87f39fa8722ca982fc5

**Description:** Updates user fill-in-the-blanks

**Body:**

**{**

**"token": "e6906c7c09b620f53ce0c64606066b6c39028cd2bad7c87f39fa8722ca982fc5",**

**"user_id": 1,**

**"fill_in_the_blanks_id": 7,**

**"completed": 2**

**}**

**Response:**

**\[**

**{**

**"id": 1,**

**"user_id": 1,**

**"fill_in_the_blanks_id": 7,**

**"completed": 2,**

**"created_at": "2025-03-18T10:58:07.000000Z",**

**"updated_at": "2025-03-18T10:58:07.000000Z",**

**"fill_in_the_blanks": {**

**"id": 7,**

**"full_sentence": "Ik moest 2 uur lang wachten",**

**"video_path": "exercise-videos/fill-in-the-blanks/Ik moest 2 uur lang wachten.mp4",**

**"missing_words": "\[\\"2\]",**

**"lesson_id": 4,**

**"created_at": "2025-03-10T13:41:50.000000Z",**

**"updated_at": "2025-03-10T13:41:50.000000Z"**

**}**

**}**

**\]**

### **Get user sentence building**

Get /api/v1/user/sentence-building?sso_token=e6906c7c09b620f53ce0c64606066b6c39028cd2bad7c87f39fa8722ca982fc5

**Description:** Retrieves a list of all user sentence building

**Response:**

**\[**

**"This user has not made any sentence building exercises yet"**

**\]**

### **Update user sentence building**

Post /api/v1/user/sentence-building?sso_token=e6906c7c09b620f53ce0c64606066b6c39028cd2bad7c87f39fa8722ca982fc5

**Description:** Updates user sentence building

**Body:**

**{**

**"token": "e6906c7c09b620f53ce0c64606066b6c39028cd2bad7c87f39fa8722ca982fc5",**

**"user_id": 1,**

**"sentence_building_id": 1,**

**"completed": 2**

**}**

**Response:**

**\[**

**{**

**"id": 1,**

**"user_id": 1,**

**"sentence_building_id": 1,**

**"completed": 2,**

**"created_at": "2025-03-18T11:00:32.000000Z",**

**"updated_at": "2025-03-18T11:00:32.000000Z",**

**"sentence_building": {**

**"id": 1,**

**"full_sentence": "Wie is dat",**

**"video_path": "exercise-videos/sentence-building/Wie is dat.mp4",**

**"lesson_id": 1,**

**"created_at": "2025-03-10T13:22:32.000000Z",**

**"updated_at": "2025-03-10T13:22:32.000000Z"**

**}**

**}**

**\]**
