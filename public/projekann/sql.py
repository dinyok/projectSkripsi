import mysql.connector

db = mysql.connector.connect(
  host="127.0.0.1",
  user="root",
  password="",
  database="skripsi")

cursor = db.cursor()
# sql = """CREATE TABLE customerss (
#   customer_id INT AUTO_INCREMENT PRIMARY KEY,
#   name VARCHAR(255),
#   address Varchar(255)
# )
# """
# cursor.execute(sql)

cursor = db.cursor()
sql = "INSERT INTO customers (name) VALUES (%s)"
val = ("j")
cursor.execute(sql, val)

db.commit()


