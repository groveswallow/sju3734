# y=(x for x in range(10))
# print(next(y))

# las=[]
# las.append('Null')
# las.append('Null')
# print(las)
# print("%s %s %s %s"%(1,None,2,None))
# x=(x for x in range(10))
# print(next(x))
# tuple(x)
# print(x)ss
# import re
# def checkgene(ser):
#     try :
#         int(ser)
#         sql="SELECT * FROM brca_v1 where pmid REGEXP '^%s'"%str(ser)
#     except:
#         if re.search(r'[^a-zA-Z0-9]',ser):
#             print('error,your input including invalidd symbol!Please input again!')
#             return 1
#         else:
#             sql="SELECT * FROM brca_v1 where tf LIKE '%s%%' or gene LIKE '%s%%'"%(str(ser),str(ser))
#     print(111111111)
s=()
p=s
print(p)
              <div class="center" style="overflow: scroll">
                <div class="table">
                  <table class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th>PMID</th>
                        <th>TF</th>
                        <th>characteristics</th>
                        <th>gene</th>
                        <th>regulation_type</th>
                        <th>cancer_hallmark</th>
                        <th>original_text</th>
                        <th>title</th>
                      </tr>
                    </thead>                        
                    <?php $p=1;
                    foreach($out as $val){ ?>
                       <?php  if( $p==1){?>
                          <tbody><td><?php echo $val;echo $p;?></td>    
                       <?php $p=$p+1;}
                        elseif ($p==8) { $p=1;?> 
                        <td><?php echo $val;echo $p;?></td></tbody>
                        <?php }
                        else { ?>  
                         <td><?php echo $val;echo $p;?></td>
                        <?php $p=$p+1;};?>
                    <?php }?>                 
          </table>
                </div>
              </div> 
                      if (empty($s)){
          echo "<H1>you don't input anything</H1>";}
        elseif (preg_match('.[^a-zA-Z0-9].',$s)==1) {
          print("<H1>error,your input including invalidd symbol!Please input again!</H1>");
        }
        else 
          { $fd=popen("python3 /home/tan/sju3734/project1/www/html/lib/seek.py $s",'r');$ret = fgets($fd);print 'whereas the expression levels of ER-α and ER-β';};
        if ($fd==NULL)
        {  
          echo '<h1>we don\'t find the data</h1>';       
          }
        else{echo $ret;fclose($fd);?>
          <?php };