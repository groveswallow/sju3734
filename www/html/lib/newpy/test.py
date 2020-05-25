# -*- coding:UTF-8 -*-
'''
@Author: Tang
@Date: 2019-12-03 20:19:59
@LastEditors: Tang
@LastEditTime: 2020-05-25 15:02:47
@Description: 
'''
import openpyxl
import sys
import os
import re
import MySQLdb as db

host = "localhost"
usr = "lcbb3734"
password = "3734"
database = "lcbb3734"
con = db.connect(host, usr, password, database,
                 use_unicode=True, charset="utf8")  # 切记检查编码以及添加编码。
cur = con.cursor()
i = "tfname"
cresql = """CREATE TABLE %s(tf_name text,tf_class text);""" % i
cur.execute(cresql)
f = open("/home/tang/Desktop/20200519/symbol_tf", "r")
lines = f.readlines()
for line in lines:
    li = line.replace("\n","")
    li = li.split(":")
    insql = """INSERT INTO lcbb3734.%s
            VALUES ("%s","%s");""" % (i,li[0], li[1])
    cur.execute(insql)
con.commit()
con.close()
f.close()
