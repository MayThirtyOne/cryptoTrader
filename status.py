import subprocess
import json


output = subprocess.getoutput("ps -ef | grep python3")
output = output.split('\n')

d={}

for l in output:
    if "python3 btc.py" in l:
        ll = l.split()
        d[ll[9]] = ll[1]

d = json.dumps(d)

print(d)
        