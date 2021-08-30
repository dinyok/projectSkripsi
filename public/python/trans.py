import sys
import os
import cv2
import numpy as np
import pytesseract
from pytesseract import Output
import matplotlib.pyplot as plt
import pandas as pd
import time
start_time = time.time()
# main()

from PIL import Image, ImageEnhance, ImageFilter
# pytesseract.pytesseract.tesseract_cmd = r'C:\Users\alvin\AppData\Local\tesseract.exe'
pytesseract.pytesseract.tesseract_cmd = r'C:\Program Files\Tesseract-OCR\tesseract.exe'
import mysql.connector
per=25

roi = [[(289, 403), (753, 440), 'Text', 'Univ'],
[(1607, 271), (2107, 344), 'Text', 'Nama'],
[(1607, 388), (2370, 426), 'Text', 'Jurusan'],
[(212, 506), (964, 1404), 'Text', 'Nilai1'], 
[(966, 506), (1716, 1404), 'Text', 'Nilai2'],
[(1721, 506), (2482, 1404), 'Text', 'Nilai3'],
[(2488, 506), (3290, 1404), 'Text', 'Nilai4']]

roi2 = [[(272, 1), (514, 25), 'Text', 'Univ'],
[(190,93), (316, 160), 'Text', 'Nama'],
[(190, 249), (353, 277), 'Text', 'Jurusan'],
# [(212, 506), (964, 1404), 'Text', 'Nilai1'], 
# [(964, 506), (1720, 1404), 'Text', 'Nilai2'],
# [(1721, 506), (2482, 1404), 'Text', 'Nilai3'],
[(8, 390), (664, 718), 'Text', 'Nilai']]


imgQ = cv2.imread('Transakrip Nilai.jpg')
# h,w,c = imgQ.shape 
# imgQ = cv2.resize(imgQ,(w//3,h//3))

# orb = cv2.ORB_create(1000)
# kp1, des1 = orb.detectAndCompute(imgQ,None)
# impKp1 = cv2.drawKeypoints(imgQ,kp1,None)

# cv2.imshow("keyPoints",impKp1)
# cv2.imshow("Output",imgQ)
# cv2.waitKey(0)

imgShow = imgQ.copy()
imgMask = np.zeros_like(imgShow)
general1 = []
general = []
courseCode = []
courses = []
SKS = []
predicate = []
nilai=[]

gray1 = cv2.cvtColor(imgQ, cv2.COLOR_BGR2GRAY)
    
## (2) Threshold
hitung = 0
hitung2 = 0
th1, threshed1 = cv2.threshold(gray1, 127, 255, cv2.THRESH_TRUNC)
    # else:
    #     th, threshed = cv2.threshold(gray, 127, 255, cv2.THRESH_BINARY)
result1 = pytesseract.image_to_string((threshed1), lang="ind")
if "UNIVERSITAS BANGSA INDONESIA" in result1:
   roi = roi
   hitung = 3
   hitung2 = 1
   hitung3 = 2
else:
    roi = roi2
    hitung = 4
    hitung2 = 0
    hitung3 = 3

    

for x,r in enumerate(roi):
    cv2.rectangle(imgMask,(r[0][0],r[0][1]),(r[1][0],r[1][1]),(0,255,0),cv2.FILLED)
    imgShow = cv2.addWeighted(imgShow,0.99,imgMask,0.1,0)
    imgCrop = imgQ[r[0][1]:r[1][1], r[0][0]:r[1][0]]
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
univ = general[0]
name = general[1]
nim = general[2]
jurusan = general[3]

for idx, data in enumerate(general):
    if idx>3:
        data = data.replace("_","")
        data = data.replace("~","")
        data = data.replace("=","")
        datas = data.split(" ")
        for i, data in enumerate(datas):
            i=i+1
        matkul=datas[hitung2]
        if i>hitung:
            matkul = ""
            for x in range(2, i-hitung3):
                matkul = matkul + " " + datas[x]
            matkul = datas[1] + matkul
        if(datas[0]!="Codes"):
            courseCode.append(datas[0])
            courses.append(matkul)
            SKS.append(datas[i-2])
            predicate.append(datas[i-1])
            idx = idx + 1 
print(univ)
print(name)
print(nim)
print(jurusan)  
# print(courseCode)
# print(courses)
# print(SKS)
# print(predicate) 
for t,data in enumerate(courseCode):
    # nilai.append(courseCode[t],courses[t],SKS[t],predicate[t])
    # t=t+1
    print(courseCode[t],courses[t],SKS[t],predicate[t])
# for idx,data in enumerate(general):
#   if(idx>=0):
print("--- %s seconds ---" % (time.time() - start_time))
#     word = general[idx].split(" ")
#     print(word)

# imgShow = cv2.resize(imgShow,(w // 3,h // 3))
# cv2.imshow("y",imgShow)
# cv2.waitKey(0)
