'''#########################################################################
# File Name: seek.py
# Author: Tang
# mail: tanzhengtang@163.com
# Created Time: 2019年09月10日 星期二 16时30分15秒
# 搜索功能   problem 目前不支持多重关键字搜索以及模糊搜索  由于转录因子和基因存在重名可能，多重显示问题
#########################################################################'''

import os,sys,MySQLdb,re
#-*- coding: utf-8 -*-
#查询函数
def checkgene(ser):
    sql="SELECT * FROM brca_v1 where tf LIKE '%s%%' or gene LIKE '%s%%'"%(str(ser),str(ser))
    try :
        int(ser)
        sql="SELECT * FROM brca_v1 where pmid REGEXP '^%s'"%str(ser)
    except:
        pass
    host="localhost"
    usr="defusr"
    password="123456"
    database="Brca"
    con=MySQLdb.connect(host,usr,password,database,use_unicode=True, charset="utf8")
    cur=con.cursor()
    # cur.execute("select COLUMN_NAME from information_schema.COLUMNS where table_name = 'brca_v1' and table_schema = 'Brca'")
    # cols=cur.fetchall()
    cur.execute(sql)
    res=cur.fetchall()
    if len(res)==0:
        print('0')
        return 0
    else:
        for i in res:
            for s in i :
                s=s.replace("α","Alpha")
                s=s.replace("β","Beta")
                s=s.replace("γ","Gamma")
                s=s.replace("δ","Delta")
                s=s.replace("ε","Epsilon")
                s=s.replace("ζ","Zeta")
                print("%s"%s)   
        # s=",".join(i)
        # p=0  #cur.execute(sql)未查询到，cur.fetchall()的元组数将会是0
        # for x in cols:
        #     if p<6 and p>0:
        #         s=s.replace("," , "    %s="%x[0],1)
        #         p=p+1
        #     elif p>=6:
        #         s=s.replace(",","\n%s="%x[0],1)
        #     else:
        #         s="pmid="+s
        #         p=p+1
    con.close()

# checkpmid(sys.argv[1])
# checkpmid(sys.argv[1])s
# checkgene(sys.argv[1])

checkgene("183")