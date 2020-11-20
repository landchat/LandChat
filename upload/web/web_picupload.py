import requests
import json
import sys

def upload(path):
    headers = {'Authorization': 'XmLIrpcug5LCAkxpPAf9bcaFtWNHWGra'}
    files = {'smfile': open(path, 'rb')}
    url = 'https://sm.ms/api/v2/upload'
    res = requests.post(url, files=files, headers=headers).json()
    if res['code'] == 'success':
        print(res['data']['url'])
        return
    if res['code'] == 'image_repeated':
        print(res['images'])
        return
    print('error')
    return


if __name__ == "__main__":
    upload(sys.argv[1])
