#!/usr/bin/env python
# coding: utf-8

# In[7]:


import requests
import time
import sys
CHANNELID = '@WRXmania'
BOT_TOKEN = '1726106325:AAHlPOfLTiSeNvmz1qk7Xgk6xl3XXkPEVCM'


# In[8]:

print(sys.argv)

BOTNAME = sys.argv[1]
COINSYMBOL = sys.argv[2]
SC = COINSYMBOL.upper()
COINSYMBOL = COINSYMBOL.lower()
COINSYMBOL+='inr'
INR = float(sys.argv[3])
FEES = float(sys.argv[4])
BUYTIMEOUT = int(sys.argv[5])
SELLTIMEOUT = int(sys.argv[6])
BUYIFLESSTHAN = float(sys.argv[7])
SELLIFGREATERTHAN = float(sys.argv[8])
MAXTRADES =  int(sys.argv[9])



def getBTCPrice():
    url = "https://api.wazirx.com/api/v2/tickers"
    response = requests.request("GET", url)
    data = (response.json())

    return float(data[COINSYMBOL]['last'])


# In[9]:


def sendTG(ALERT_MESSAGE):
    ALERT_MESSAGE = BOTNAME + " : " + ALERT_MESSAGE
    send_text = 'https://api.telegram.org/bot' + BOT_TOKEN + '/sendMessage?chat_id=' + CHANNELID + '&parse_mode=Markdown&text=' + ALERT_MESSAGE
    response = requests.get(send_text)
    # print(ALERT_MESSAGE)


# In[10]:


def processDecimal(number):
   number = float(number)
   number =  round(number,12)
   return str(number)

def targetPrice(number):
    number=float(number)
    number = number+ FEES*number
    return number

# In[11]:



trade = 1


def adjustFees(number):
    number = float(number)
    number = number - FEES*number
    return number

# In[ ]:





sendTG(f'🤖 BOT 🤖 - {BOTNAME} Started Initial Investment: ₹{INR} M/T Fees: ₹{FEES} Per Transaction Coin: {SC} Buy TimeOut: {BUYTIMEOUT} Sell TimeOut: {SELLTIMEOUT} Buy If Less Than: {BUYIFLESSTHAN} Sell If Greater Than: {SELLIFGREATERTHAN} Max Trades: {MAXTRADES}')

while True:
    if trade >= MAXTRADES:
        sendTG("Maximum Trades Reached!")
        sys.exit(0)
    p = getBTCPrice()
    sendTG(f'🤖 Bot 🤖 Started With Capital = ₹ {processDecimal(INR)}')
    sendTG(f'⏰ Current ⏰ {SC} Price = ₹{p}')
    sendTG("⌛ 📉 Waiting For Price Drop To Buy 📉 ⌛")
    buyFlag = False
    sellFlag = False
    timeOut = 0
    tradeConcluded = False
    timedOut = False
    buyPrice = 111.11
    while True and tradeConcluded == False and timedOut == False:
        timeOut+=1
        np = getBTCPrice()
        if np < p:
            if (p - np) > BUYIFLESSTHAN and buyFlag == False:
                TINR = INR
                INR = adjustFees(INR)
                sendTG(f'--🚨 Price DROP 🚨-- Initial: ₹{p} Final: ₹{np} Difference: {processDecimal(p-np)} Buying {SC} qty: {processDecimal(INR/np)}')
                buyFlag = True
                buyPrice = np
                boughtCoins = INR/np
                sellableCoins = adjustFees(boughtCoins)
                tp = TINR/sellableCoins
                sendTG(f'🙏 Min. Profitable Target 🙏  ₹{tp} Min. Profitable Margin: {tp-buyPrice}')
                sendTG("⌛ 📈 Waiting For Target Hike 📈 ⌛")
        if np > buyPrice:
            
            if (np - buyPrice) > max(SELLIFGREATERTHAN, tp-buyPrice) and sellFlag == False and buyFlag == True:
                boughtCoins = adjustFees(boughtCoins)
                sendTG(f'--🚀 Price HIKE 🚀-- Bought At: ₹{buyPrice} Now: ₹{np} Difference: {processDecimal(np - buyPrice)} Selling {SC} Quantity: {processDecimal(boughtCoins)}')
                sellFlag = True
                sellPrice = np
                profit = boughtCoins*np

        if buyFlag == True and sellFlag == True:
            INR = profit
            sendTG(f'🥳 Trade Concluded! 🥳  This Trade Gain = ₹{processDecimal(profit - TINR)} Capital After MT Fees = ₹{processDecimal(INR)}')
            sendTG(f'----------🤝 Trade: {trade} 🤝----------')
            trade+=1
            tradeConcluded = True
        if timeOut > BUYTIMEOUT:
            if buyFlag == False and sellFlag == False:
                sendTG(f'😐 No Price Drop Observed In Past  {BUYTIMEOUT} Seconds. 😐 Trying Again.')
                timedOut = True

        if timeOut > SELLTIMEOUT:
            if buyFlag == True:
                cp = getBTCPrice()
                boughtCoins = adjustFees(boughtCoins)
                sendTG(f'😥 No Price Hike For {SELLTIMEOUT} Seconds 😥, Sold For 🚩 LOSS! 🚩 Selling Price =₹{cp}  Loss Amount: ₹{INR - boughtCoins*cp}')
                INR = (boughtCoins*cp)
                sendTG(f'---------- 🤝Trade: {trade} 🤝----------')
                trade+=1
                timedOut = True

        time.sleep(1)
        

            
            


# In[ ]:





# In[ ]:





# In[ ]:





# In[ ]:





# In[ ]:





# In[ ]:




