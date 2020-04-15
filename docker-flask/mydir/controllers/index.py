import mysql.connector

class Index(object):

    def hello(self):
        mydb = mysql.connector.connect(
            host="10.6.8.191",
            user="lesson2",
            passwd="kasemituyo3",
            database="sakila"
        )

        mycursor = mydb.cursor()

        mycursor.execute("SELECT * FROM actor")

        myresult = mycursor.fetchall()

        # for x in myresult:
        #     print(x)

        return myresult;
