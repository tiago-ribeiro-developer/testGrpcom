import os, logging, time, random, shutil, timeit, re, json

from pyvirtualdisplay import Display
from selenium import webdriver
from selenium.common.exceptions import InvalidArgumentException

def readJson():
    global globalUrl
    global globalStrDiretory
    initLogInfo()

    content = open('configTestAutomated.json').read()
    config = json.loads(content)
    globalUrl = config.get("globalUrl")
    globalStrDiretory = config.get("globalStrDiretory")
    logging.info("Url ==> "+globalUrl)
    logging.info("Diretory ==> "+globalStrDiretory)

def initBrowserFirefox():
    initLogInfo()
    global driver
    display = Display(visible=0, size=(1500, 1000))
    display.start()
    driver = webdriver.Firefox()
    driver.get(globalUrl)
    logging.info("Iniciando navegador Firefox")

# inicia o log do terminal
def initLogInfo():
    logging.getLogger().setLevel(logging.INFO)

# cria os diretorios
def createDiretory(strScreenshots):
    if not os.path.exists(globalStrDiretory):
        os.mkdir(globalStrDiretory)
        logging.info("Criou o diretorio: "+globalStrDiretory)
    else:
        shutil.rmtree(globalStrDiretory)
        logging.info("Removeu os arquivos do diretorio "+globalStrDiretory)
        os.mkdir(globalStrDiretory)
        logging.info("Criou o diretorio de "+globalStrDiretory)
    driver.save_screenshot(globalStrDiretory+'/'+strScreenshots)

def selectDate(strDate):
    driver.find_element_by_id('contentDate').send_keys(strDate)
    driver.save_screenshot(globalStrDiretory+'/2_dados_de_data.png')
    logging.info("colocou a dada")

def clickDate():
    driver.find_element_by_id('searchDate').click()
    driver.save_screenshot(globalStrDiretory+'/3_dados_retornados.png')
    logging.info("clicou no botão")

def checkResult():
    firstCard = driver.find_element_by_xpath("/html/body/div/section/div/div/a/p[1]").text
    assert "Santa Missa" in firstCard, 'OPS !!! Erro ao validar o primeiro card'
    logging.info("valida o primeiro card")



# inicia o script
if __name__ == "__main__":

    # le o json de configuração
    print('***************************')
    readJson()

    initTimer = timeit.default_timer()
    initBrowserFirefox()
    createDiretory('1_tela_inicial.png')
    selectDate('2020-11-15')
    clickDate()
    checkResult()

    print('')
    endTimer = timeit.default_timer()
    print('')
    print ('ESTE TESTE DUROU : %f' % (endTimer - initTimer))
    print('***************************')