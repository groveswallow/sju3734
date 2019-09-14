'''#########################################################################
# File Name: datafunction.py
# Author: Tang
# mail: tanzhengtang@163.com
# Created Time: 2019年09月13日 星期五 14时39分50秒
#########################################################################'''
import openpyxl,sys,os,re
import MySQLdb as db
#报错机制未解决
host="localhost"
usr="root"
password="006659"
database="role"
con=db.connect("localhost","root","006659","role")
cur=con.cursor()
wb=openpyxl.load_workbook('/home/tan/sju3734/project1/www/html/lib/brca.xlsx')
f=0 #循环下标
for i in wb :
    tabname=wb.sheetnames[f]
    f=f+1 #此时f加1，为取出下一张excel的数据表做准备  i为实际的
    print(tabname)
    rows=i.max_row
    tab_row=(x for x in i)
    for x in range(1,rows):            
        if x!=1:
          map(intab,next(tab_row))
        else:
          map(cretab,next(tab_row))

def cretab(tab_row):
    f=0
    for keyname in tab_row:
        if  f>0 and f<6:
            cresql="""alter table %s add %s varchar(30)"""%(tabname,keyname)
            f=f+1      
        elif f>=6:
            cresql="""alter table %s add %s text"""%(tabname,keyname)
        else :      
            cresql="""CREATE TABLE %s(
            %s CHAR(10) PRIMARY KEY)"""%(tabname,keyname)
            f=f+1      
    try:
        cur.execute(cresql)
        con.commit()
    except:
        con.rollback()

def intab(tab_row):
    cur.execute("show COLUMNS from %s"%tabname)
    cols= ",".join(str(i) for i in cur.fetchall())
    row_value=",".join(str(i) for i in tab_row)
    insql= """INSERT INTO %s(%s)
         VALUES (%s)"""%(tabname,cols,row_value)
    cur.execute(insql)

con.close()

    

