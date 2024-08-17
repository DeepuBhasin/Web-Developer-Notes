### 📘MongoDB

![Image](./images/mongodb-1.png)

* MongoDb is a NoSql database (store data into objects)

* The data stored in a collection

* collection don't have a row and columns

* Data is stored in the form of object.

* Best example : in case if we want to add extra data then in sql database we have to create extra tables but on NoSql we do not need that

![Image](./images/mongodb-2.png)

---

### 📘Installation

* By typing `mongosh` in any terminal like cmd, git bash etc you mongo db server will run.

* By **MongoDB Compass** its a GUI Software to access MongoDB databases just like phpMyAdmin, through this you can perform crud operations directly. It also provide terminal to execute commands

---

### 📘Commands

**Database Commands**

1. Create Database and select : this command will create database no matter database exist or not.

    ```
    use Database-name
    ```
2. To Show Databases

    ```
    show dbs
    ```


3. To Delete Database : This command will run if you have already selected a database.

    ```
    db.dropDatabase();
    ```

**Collections Commands**


1. To create Collection

    ```
    db.createCollection('tours')
    ```

2. To Show collections

    ```
    show collections
    ```

3. To Delete collection

    ```
    db.tours.drop();
    ```

**Insert Commands**

1. Create collection with single entry

    ````
    db.tours.insertOne({firstName : "Deep", lastName : "Singh"})
    ````

2. Create collection with multiple enter

    ```
    db.tours.insertMany([{"name":"Product A","price":19.99,"rating":4.5},{"name":"Product B","price":29.49,"rating":4.0},{"name":"Product C","price":9.99,"rating":3.8},{"name":"Product D","price":45.00,"rating":4.7},{"name":"Product E","price":15.75,"rating":3.9}]);
    ```

3. To see inserted data

   ```
   db.tours.find()
   ```

**Select Query**

1. To Find any record among collections (easy way)

    ```
    db.tours.find({name : "Product A"})
    ```
2. To find less then or equal to (<=) : `$` sign is use as operator in mongoDB

    ```
    db.tours.find({price : {$lte : 10}})
    ```

3. AND Query : To find less then and greater then or equal to

    ```
    db.tours.find({price : {$lt : 25}, rating : {$gte : 4}})
    ```

4. OR Query

    ```
    db.tours.find({$or :  [{ price : {$lt : 10}}, {rating : {$lte : 4}}]});
    ```

5. OR Query with selection of specific key

    ```
    db.tours.find({$or :  [{ price : {$lt : 10}}, {rating : {$lte : 4}}]}, {name : 1});
    ```

**Update Query**

1.  Update Query :

    1. first object is use to select and second one is use to set value or can insert new value

    ```
    db.tours.updateOne({ name : 'Product A'}, {$set : {price : 1000, color : white}});
    ```
    **⚠️Note :** updateOne method always update first record no matter if there are many with same conditions like name is same etc.


    2. For update many records
    ```
    db.tours.updateMany({rating : {$gt : 4}}, {$set : { isAdmin : false}});
    ```

**Delete Query**

1.  To Delete One Row

    ```
    db.tours.deleteOne({name : "Product E"})
    ```
     **⚠️Note :** deleteOne method always delete first record no matter if there are many with same conditions like name is same etc.

2. To Delete all records (be careful this command )

    ```
    db.tours.deleteMany({});
    ```