'''
@Author: Tang
@Date: 2020-02-19 22:02:12
@LastEditors: Tang
@LastEditTime: 2020-02-19 23:52:20
@Description: 
'''
import os
def getdirsize(dir):
    size = 0
    for root, dirs, files in os.walk(dir):
        size += sum([os.path.getsize(os.path.join(root, name)) for name in files])
    return size
path = '/home/tan/sju3734/project1/www/html/Submit'
sz = getdirsize(path)
print(sz)

# $filesize = exec('python3 /home/tan/sju3734/project1/www/html/filesize.py');
# if ($filesize < 1024*1024*1024){
#     $res = exec("python3 /home/tan/sju3734/project1/www/html/submit.py $pmid $tf $cancer $gene $hallmark $regulation_type $email");
#     echo $res;
# }
# else{
#     echo null;
# }