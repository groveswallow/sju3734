'''#########################################################################
# File Name: seek.py
# Author: Tang
# mail: tanzhengtang@163.com
# Created Time: 2019年09月10日 星期二 16时30分15秒
# 搜索功能   problem 目前不支持多重关键字搜索以及模糊搜索  由于转录因子和基因存在重名可能，多重显示问题
#########################################################################'''

import os,sys,MySQLdb,re
#查询函数
def checkpmid(ser):
    host="localhost"
    usr="defusr"
    password="123456"
    database="Brca"
    con=MySQLdb.connect(host,usr,password,database,use_unicode=True, charset="utf8")
    cur=con.cursor()
    cur.execute("select COLUMN_NAME from information_schema.COLUMNS where table_name = 'brca_v1' and table_schema = 'Brca'")
    cols=cur.fetchall()
    try:
        int(ser)
        sql="SELECT * FROM brca_v1 where pmid REGEXP '^%s'"%str(ser) #假如是pmid的查询方式
        # print(sql)
        cur.execute(sql)  
        for i in cur.fetchall():
            s=",".join(i)
            p=0  #cur.execute(sql)未查询到，cur.fetchall()的元组数将会是0
            for x in cols:
                if p<6 and p>0:
                    s=s.replace("," , "    %s="%x[0],1)
                    p=p+1
                elif p>=6:
                    s=s.replace(",","\n%s="%x[0],1)
                else:
                    s="pmid="+s
                    p=p+1
            print(s)                
    except:
        print("error")
    con.close()


def checkgene(ser):
    host="localhost"
    usr="defusr"
    password="123456"
    database="Brca"
    con=MySQLdb.connect(host,usr,password,database,use_unicode=True, charset="utf8")
    cur=con.cursor() 
    if re.search(r'[^a-zA-Z0-9]',ser):
        print('error,your input including invalidd symbol!Please input again!')
    else:
        sql="SELECT * FROM brca_v1 where tf LIKE '%s%%' or gene LIKE '%s%%'"%(str(ser),str(ser))
        cur.execute(sql)
        for i in cur.fetchall():
            print(",".join(i))
    con.close()

# checkpmid(sys.argv[1])
checkpmid(sys.argv[1])
# checkgene("p53")
# checkgene(sys.argv[1])



#     print("You have input some invalid symbol,please input letters or numbers\n")
# else :
    
