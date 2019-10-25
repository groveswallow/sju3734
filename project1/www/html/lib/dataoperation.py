'''#########################################################################
# File Name: dataoperation.py
# Author: Tang
# mail: tanzhengtang@163.com
# Created Time: 2019年10月14日 星期一 20时17分18秒
# Purpose：改写类，尝试将增删集中到一个类上，尽可能通用化。
# 待解决：此脚本适合本地后台加快速度对数据库进行操作，一旦用户端希望对数据库进行上传文件，使用php进行操作。
#########################################################################'''
#!/bin/python
import openpyxl,sys,os,re
import MySQLdb as db
class dataoperation:
    def __init__(self,host,usr,name,password,database,excel):
        self.host=host
        self.usr=usr
        self.name=name
        self.password=password
        self.database=database
        self.excel=os.getcwd()+"/%s.xlsx"%excel
        try:
            wb=openpyxl.load_workbook(self.excel)
            con=db.connect(self.host,self.usr,self.password,self.database,use_unicode=True, charset="utf8")
        except:
            print("somethings are wrong,please check your code !\n")
    def add(self):
        pass
    def delsapce(self):
        pass


