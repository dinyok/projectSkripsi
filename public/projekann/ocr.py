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

## (1) Read
img = cv2.imread('tester.png')
gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)

## (2) Threshold
th, threshed = cv2.threshold(gray, 127, 255, cv2.THRESH_TRUNC)

## (3) Detect
result = pytesseract.image_to_string((threshed), lang="ind")
nama ="a"
nim="a"
# ## (5) Normalize
for word in result.split("\n"):
  if "”—" in word:
    word = word.replace("”—", ":")
  
  #normalize NIK
  # if "NIK" in word:
  #   nik_char = word.split()
  #   if "D" in word:
  #     word = word.replace("D", "0")
  #   if "?" in word:
  #     word = word.replace("?", "7")   
  if "Nama" in word:
    # nama_char = word.split()
    word = word.replace("Nama: ", "")
    # print("Jurusan:",word)
    nama = word
    print(nama)
  if "NIM" in word:
    # NIM_char = word.split()
    word = word.replace("NIM: ", "")
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
    word = word.replace("PLC: ","")
    w = word.split("x")
    #plc_char=word
    print(w[0])
cursor = db.cursor()
sql = "INSERT INTO customers (name, nim) VALUES (%s, %s)"
val = (nama, nim)
cursor.execute(sql, val)

db.commit()

# print("{} data ditambahkan".format(cursor.rowcount))
# Cobalah untuk eksekusi…
# if db.is_connected():
#   print("Berhasil terhubung ke database")


