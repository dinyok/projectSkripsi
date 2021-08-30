import sys
import os
import cv2
import numpy as np
import pytesseract
from pytesseract import Output
from datetime import datetime
import matplotlib.pyplot as plt
# import pandas as pd
from PIL import Image, ImageEnhance, ImageFilter
# pytesseract.pytesseract.tesseract_cmd = r'C:\Users\alvin\AppData\Local\tesseract.exe'
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
today = datetime.today()
filename = nama_file.split(".")[0]
path = r'C:\xampp\htdocs\projectSkripsi\public\uploadFile'
## (1) Read
img = cv2.imread(os.sep.join([path, nama_file]))
# per=25
# roi=[[(220, 592), (968, 1194), 'Text', 'nilai1'],
# [(982, 594), (1738, 1206), 'Text', 'nilai2'],
# [(1754, 598), (2514, 1206), 'Text', 'nilai3']]
roi = [[(1628, 272), (2354, 338), 'Text', 'Nama'],
[(1630, 388), (2370, 426), 'Text', 'Jurusan'],
[(212, 506), (974, 1422), 'Text', 'Nilai1'], 
[(978, 506), (1742, 1424), 'Text', 'Nilai2'],
[(1754, 598), (2514, 1206), 'Text', 'nilai3']]

# roi = [[(1607, 271), (2107, 344), 'Text', 'Nama'],
# [(1607, 388), (2370, 426), 'Text', 'Jurusan'],
# [(212, 506), (964, 1404), 'Text', 'Nilai1'], 
# [(966, 506), (1716, 1404), 'Text', 'Nilai2'],
# [(1721, 506), (2482, 1404), 'Text', 'Nilai3'],
# [(2488, 506), (3290, 1404), 'Text', 'Nilai4']]


# imgQ = cv2.imread('transkrip2.png')
# h,w,c = imgQ.shape 
# imgQ = cv2.resize(imgQ,(w//3,h//3))

# orb = cv2.ORB_create(1000)
# kp1, des1 = orb.detectAndCompute(imgQ,None)
# impKp1 = cv2.drawKeypoints(imgQ,kp1,None)

# cv2.imshow("keyPoints",impKp1)
# cv2.imshow("Output",imgQ)
# cv2.waitKey(0)

imgShow = img.copy()
imgMask = np.zeros_like(imgShow)
general = []
courseCode = []
courses = []
SKS = []
predicate = []
for x,r in enumerate(roi):
    cv2.rectangle(imgMask,(r[0][0],r[0][1]),(r[1][0],r[1][1]),(0,255,0),cv2.FILLED)
    imgShow = cv2.addWeighted(imgShow,0.99,imgMask,0.1,0)
    imgCrop = img[r[0][1]:r[1][1], r[0][0]:r[1][0]]
    # cv2.imshow(str(x),imgCrop)
    # cv2.waitKey(0)
    
    gray = cv2.cvtColor(imgCrop, cv2.COLOR_BGR2GRAY)
    
## (2) Threshold
    
    th, threshed = cv2.threshold(gray, 127, 255, cv2.THRESH_TRUNC)
    # else:
    #     th, threshed = cv2.threshold(gray, 127, 255, cv2.THRESH_BINARY)
    result = pytesseract.image_to_string(threshed)
    for word in result.split("\n"):
        if not word or word.isspace():
            continue
        else :
            # print(word)
            general.append(word)
name = general[0]
nim = general[1]
jurusan = general[2]
for idx, data in enumerate(general):
    if idx>2:
        data = data.replace("_","")
        data = data.replace("~","")
        data = data.replace("=","")
        datas = data.split(" ")
        for i, data in enumerate(datas):
            i=i+1
        matkul=datas[1]
        if i>3:
            matkul = ""
            for x in range(2, i-2):
                matkul = matkul + " " + datas[x]
            matkul = datas[1] + matkul
        if(datas[0]!="Codes"):
            courseCode.append(datas[0])
            courses.append(matkul)
            SKS.append(datas[i-2])
            predicate.append(datas[i-1])
            sql = "INSERT INTO grades (user_id, document_id, code, courses, scu, grade, created_at, updated_at) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)"
            val = (user_id, doc_id,datas[0], matkul, datas[i-2], datas[i-1], today, today)
            cursor.execute(sql, val)
            idx = idx + 1 
# print(name)
# print(nim)
# print(jurusan)  
# print(courseCode)
# print(courses)
# print(SKS)
# print(predicate) 

sql = "UPDATE documents SET name = %s, nim = %s, jurusan = %s WHERE filename = %s"
val = (name, nim, jurusan, nama_file)
cursor.execute(sql, val)

db.commit()
# for idx,data in enumerate(general):
#   if(idx>=0):
#     word = general[idx].split(" ")
#     print(word)

# imgShow = cv2.resize(imgShow,(w // 3,h // 3))
# cv2.imshow("y",imgShow)
# cv2.waitKey(0)
