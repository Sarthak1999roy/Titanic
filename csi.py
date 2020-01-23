import pandas as pd
import warnings
import matplotlib.pyplot as pt
warnings.simplefilter('ignore')
def plt_surv(df):
    x=int(df['survived'][df['survived']==0].value_counts())
    y=int(df['survived'][df['survived']==1].value_counts())
    print('Survived= ',y)
    print('Did Not Survive= ',x)
    pt.bar([1,2],[y,x],[1,1],color=['r','g'],align='center')
    pt.xticks([1,2],['Survived','Did Not Survive'])
    pt.show()

def plt_sex(df):
    df1=df['survived'][df['sex']=='male']
    x=int(df1[df1==0].value_counts())
    y=int(df1[df1==1].value_counts())
    print('Males Survived= ',y)
    print('Males Did Not Survived= ',x)
    pt.bar([1,2],[y,x],[1,1],color=['c','g'],align='center')
    pt.xticks([1,2],[' Males Survived','Males Did Not Survive'])
    pt.show()
    df2=df['survived'][df['sex']=='female']
    x=int(df2[df2==0].value_counts())
    y=int(df2[df2==1].value_counts())
    print('Females Survived= ',y)
    print('Females Did Not Survived= ',x)
    pt.bar([1,2],[y,x],[1,1],color=['c','g'],align='center')
    pt.xticks([1,2],[' Females Survived','Females Did Not Survive'])
    pt.show()
    nor_surv(df1,df2)

def nor_surv(df1,df2):
    x=df1.value_counts(normalize=True)
    print('Males Survival Rate= ',x[1]*100,'%')
    x=df2.value_counts(normalize=True)
    print('Females Survival Rate= ',x[1]*100,'%')

def chld_surv(df):
    k=df['survived'][df['child']==True].value_counts()
    l=df['survived'][df['child']==False].value_counts()
    r=pd.DataFrame([[int(k[0]),int(k[1])],[int(l[0]),int(l[1])]],index=['Child','Adult'],columns=['Survived','Did not Survive'])
    r.plot(kind='bar')
    pt.tight_layout()
    pt.show()
    k=df['survived'][df['child']==True].value_counts(normalize=True)
    l=df['survived'][df['child']==False].value_counts(normalize=True)
    print('Children Survived=',float(k[1])*100,'%')
    print('Adult Survived=',float(l[1])*100,'%')

def read_xcl():
    df=pd.read_excel("titanic.xls",index_col="pclass")
    pd.set_option('display.max_columns', None,'display.max_rows',None)
    df['child']=None
    df['child'][df['age']<=18]=True
    df['child'][df['age']>18]=False
    print(df)
    return df
df=read_xcl()
plt_surv(df)
plt_sex(df)
chld_surv(df)
