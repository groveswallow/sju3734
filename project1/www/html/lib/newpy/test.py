'''
@Author: Tang
@Date: 2019-12-03 20:19:59
@LastEditors: Tang
@LastEditTime: 2020-04-03 13:58:15
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
i = "regulation_type"
cresql = """CREATE TABLE %s(regulation_type text NOT NULL);""" % i
cur.execute(cresql)
f = open("/home/tang/Desktop/regulation_type", "r")
# p = open("/home/tang/sju3734/project1/www/html/lib/newpy/TissgDB_basic_uniq.txt","r")
lines = f.readlines()
for line in lines:
    print(line[:-1])
    insql = """INSERT INTO lcbb3734.%s
            VALUES ("%s");""" % (i, line[:-1])
    cur.execute(insql)
con.commit()
con.close()
f.close()
