'''#########################################################################
# File Name: seek.py
# Author: Tang
# mail: tanzhengtang@163.com
# Created Time: 2019年09月10日 星期二 16时30分15秒
# 搜索功能   problem 目前不支持多重关键字搜索以及模糊搜索  由于转录因子和基因存在重名可能，多重显示问题
#########################################################################'''

import os,sys,MySQLdb,re
#查询函数
def sel(ser):
    #该用户为游客权限，只拥有对Brca查询权限
    host="localhost"
    usr="defusr"
    password="123456"
    database="Brca"
    con=MySQLdb.connect(host,usr,password,database,use_unicode=True, charset="utf8")
    cur=con.cursor()
    #测试是否连接成功
    # cur.execute("SELECT VERSION()")
    # data = cur.fetchone()
    # print ("Database version : %s " % data)
    try:
        int(ser)
        # sql="SELECT * FROM brca_v1 where pmid REGEXP '%s'"%str(ser)
        sql="SELECT * FROM brca_v1 where pmid='110'"
        print(sql)
        cur.execute(sql)
        print(len(cur.fetchall()))
    except:
        print("error")
    # cur.execute()
    # cur.fetchall()
    con.close()

# ser=sys.argv[1] #默认参数为PHP传递的字符串 
# if re.search(r'[^a-zA-Z0-9]',ser):
#     print("You have input some invalid symbol,please input letters or numbers\n")
# else :
    
sel("1")