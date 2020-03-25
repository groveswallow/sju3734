'''
@Author: Tang
@Date: 2019-12-03 20:19:59
@LastEditors: Tang
@LastEditTime: 2020-03-25 12:23:41
@Description: 
'''
import openpyxl
import sys
import os
import re
file = '/home/tang/Desktop/33cancer/brca.xlsx'
wb = openpyxl.load_workbook(file)
ws = wb.get_sheet_by_name(wb.sheetnames[0])
for x in range(2, ws.max_row+1):
   if ws['A%d' % x].value == None:
      ws['A%d' % x].value = ws['A%d' % (x-1)].value
      print(ws['A%d' % (x-1)].value)
   else:
      pass
wb.save(file)
wb.close()