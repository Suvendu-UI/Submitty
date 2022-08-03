import sys

def average(lst):
    sum = 0
    n = len(lst)
    for element in lst:
        sum += element
    return sum/n

def standard_deviation(lst, avg):
    v = 0
    n = len(lst)
    for element in lst:
        v += (element - avg)**2
    return (v/(n - 1))**0.5

args = len(sys.argv)

if (args != 2):
    raise Exception("input file needed")

file = sys.argv[1]

txt_file = open(file, "r")

content_list = txt_file.readlines()

for line in content_list:
    lst = list(map(float, line.rstrip().split(",")))
    avg = average(lst)
    sd = standard_deviation(lst, avg)
    print("avg: " + str(round(avg, 3)) + " sd: " + str(round(sd, 3)))