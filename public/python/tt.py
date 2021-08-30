import sys
import os
import cv2
import numpy as np
import pytesseract
from pytesseract import Output
import matplotlib.pyplot as plt
from PIL import Image
pytesseract.pytesseract.tesseract_cmd = r'C:\Program Files\Tesseract-OCR\tesseract.exe'

import mysql.connector

db = mysql.connector.connect(
  host="127.0.0.1",
  user="root",
  password="",
  database="skripsi"
)
cursor = db.cursor()
doc_id = sys.argv[3]
user_id = sys.argv[2]
nama_file = sys.argv[1]
filename = nama_file.split(".")[0]
path = r'C:\xampp\htdocs\projectSkripsi\public\uploadFile'
## (1) Read
img = cv2.imread(os.sep.join([path, nama_file]))
gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)

## (2) Threshold
th, threshed = cv2.threshold(gray, 127, 255, cv2.THRESH_TRUNC)

## (3) Detect
result = pytesseract.image_to_string((threshed), lang="ind")
nama ="a"
nim="a"
PLC=[]
Algo=[]
CB=[]
Math=[]
English=[]
Indonesian=[]
Networking=[]
Database=[]
SE=[]
AI=[]
# ## (5) Normalize
for word in result.split("\n"):
  if "”—" in word:
    word = word.replace("”—", ":")

  if "Nama" in word:
    # nama_char = word.split()
    word = word.replace("Nama: ", "")
    # print("Jurusan:",word)
    nama = word
    print(nama)
  if "NIM" in word:
    # NIM_char = word.split()
    word = word.replace("NIM:", "")
    word = word.replace(" ","")
    # print("Jurusan:",word)
    nim = word
    print(nim)  
  if "Jurusan" in word:
    # jurusan_char = word.split()
    word = word.replace("Jurusan: ", "")
    # print("Jurusan:",word)
    jurusan = word
    print(jurusan)
  # print(word)
  if "PLC" in word:
    word = word.replace("PLC:","")
    word = word.replace(" ","")
    PLC = word.split("x")
    #plc_char=word
    print(PLC[0])
    print(PLC[1])
    print(PLC[2])
    sql = "INSERT INTO grades (user_id, doc_id, matkul, nilai, sks, predikat) VALUES (%s, %s, %s, %s, %s, %s)"
    val = (user_id, doc_id, "PLC", PLC[0], PLC[1], PLC[2])
    cursor.execute(sql, val)
  if "Algo" in word:
    word = word.replace("Algo:","")
    word = word.replace(" ","")
    Algo = word.split("x")
    print(Algo[0])
    print(Algo[1])
    print(Algo[2])
    sql = "INSERT INTO grades (user_id, doc_id, matkul, nilai, sks, predikat) VALUES (%s, %s, %s, %s, %s, %s)"
    val = (user_id, doc_id, "Algo", Algo[0], Algo[1], Algo[2])
    cursor.execute(sql, val)
  if "CB" in word:
    word = word.replace("CB:","")
    word = word.replace(" ","")
    CB = word.split("x")
    print(CB[0])
    print(CB[1])
    print(CB[2])
    sql = "INSERT INTO grades (user_id, doc_id, matkul, nilai, sks, predikat) VALUES (%s, %s, %s, %s, %s, %s)"
    val = (user_id, doc_id, "CB", CB[0], CB[1], CB[2])
    cursor.execute(sql, val)
  if "Math" in word:
    # word = word.split(":")
    # Math = word[1].split("x")
    word = word.replace("Math:","")
    word = word.replace(" ","")
    Math = word.split("x")
    print(Math[0])
    print(Math[1])
    print(Math[2])
    sql = "INSERT INTO grades (user_id, doc_id, matkul, nilai, sks, predikat) VALUES (%s, %s, %s, %s, %s, %s)"
    val = (user_id, doc_id, "Math", Math[0], Math[1], Math[2])
    cursor.execute(sql, val)
  if "English" in word:
    word = word.replace("English:","")
    word = word.replace(" ","")
    English = word.split("x")
    print(English[0])
    print(English[1])
    print(English[2])
    sql = "INSERT INTO grades (user_id, doc_id, matkul, nilai, sks, predikat) VALUES (%s, %s, %s, %s, %s, %s)"
    val = (user_id, doc_id, "English", English[0], English[1], English[2])
    cursor.execute(sql, val)
  if "Indonesian" in word:
    word = word.replace("Indonesian:","")
    word = word.replace(" ","")
    Indonesian = word.split("x")
    print(Indonesian[0])
    print(Indonesian[1])
    print(Indonesian[2])
    sql = "INSERT INTO grades (user_id, doc_id, matkul, nilai, sks, predikat) VALUES (%s, %s, %s, %s, %s, %s)"
    val = (user_id, doc_id, "Indonesian", Indonesian[0], Indonesian[1], Indonesian[2])
    cursor.execute(sql, val)
  if "Networking" in word:
    word = word.replace("Networking:","")
    word = word.replace(" ","")
    Networking = word.split("x")
    print(Networking[0])
    print(Networking[1])
    print(Networking[2])
    sql = "INSERT INTO grades (user_id, doc_id, matkul, nilai, sks, predikat) VALUES (%s, %s, %s, %s, %s, %s)"
    val = (user_id, doc_id, "Networking", Networking[0], Networking[1], Networking[2])
    cursor.execute(sql, val)
  if "Database" in word:
    word = word.replace("Database:","")
    word = word.replace(" ","")
    DB = word.split("x")
    print(DB[0])
    print(DB[1])
    print(DB[2])
    sql = "INSERT INTO grades (user_id, doc_id, matkul, nilai, sks, predikat) VALUES (%s, %s, %s, %s, %s, %s)"
    val = (user_id, doc_id, "Database", DB[0], DB[1], DB[2])
    cursor.execute(sql, val)
  if "SE" in word:
    word = word.replace("SE:","")
    word = word.replace(" ","")
    SE = word.split("x")
    print(SE[0])
    print(SE[1])
    print(SE[2])
    sql = "INSERT INTO grades (user_id, doc_id, matkul, nilai, sks, predikat) VALUES (%s, %s, %s, %s, %s, %s)"
    val = (user_id, doc_id, "SE", SE[0], SE[1], SE[2])
    cursor.execute(sql, val)
  if "AI" in word:
    word = word.replace("AI:","")
    word = word.replace(" ","")
    AI = word.split("x")
    print(AI[0])
    print(AI[1])
    print(AI[2])
    sql = "INSERT INTO grades (user_id, doc_id, matkul, nilai, sks, predikat) VALUES (%s, %s, %s, %s, %s, %s)"
    val = (user_id, doc_id, "AI", AI[0], AI[1], AI[2])
    cursor.execute(sql, val)

sql = "INSERT INTO customers (user_id, name, nim, filename) VALUES (%s, %s, %s, %s)"
val = (user_id, nama, nim, filename)
cursor.execute(sql, val)

db.commit()

# print("{} data ditambahkan".format(cursor.rowcount))
# Cobalah untuk eksekusi…
# if db.is_connected():
#   print("Berhasil terhubung ke database")


