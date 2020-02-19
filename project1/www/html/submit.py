'''
@Author: Tang
@Date: 2020-02-19 21:52:57
@LastEditors: Tang
@LastEditTime: 2020-02-19 22:57:31
@Description: 
'''
import os
import sys
import time
pmid = sys.argv[1]
tf = sys.argv[2]
cancer = sys.argv[3]
gene = sys.argv[4]
hallmark = sys.argv[5]
regulation_type = sys.argv[6]
email = sys.argv[7]
# pmid = '1'
# tf = '2'
# cancer = '3'
# gene = '4'
# hallmark = '5'
# regulation_type = '6'
# email = '7'
ti = time.strftime("%Y-%m-%d-%H:%M:%S", time.localtime()) 
txt = """
pmid : %s\n
tf : %s\n
cancer : %s\n
gene : %s\n
hallmark : %s\n
regulation_type : %s\n
email : %s\n
time : %s"""%(pmid,tf,cancer,gene,hallmark,regulation_type,email,ti)
fo = open("/home/tan/sju3734/project1/www/html/Submit/%s"%ti,'w')
fo.write(txt)
fo.close
print(1)