import mysql.connector

class Index(object):

    def hello(self):
        try:
            mydb = mysql.connector.connect(
                # host="10.6.8.191",
                # user="lesson",
                # passwd="kasemituyo3",
                # database="world"

                #local case
                host="test-mysql-container",
                user="root",
                passwd="123",
                database="testdb"
            )

            mycursor = mydb.cursor()

            mycursor.execute("SELECT * FROM employees")
            # mycursor.execute("select * from country limit 1")

            myresult = mycursor.fetchall()

            # for x in myresult:
            #     print(x)

            return myresult;
        except:
            return ["MYSQL ERROR!!!"]
