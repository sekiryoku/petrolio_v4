const lang=document.querySelector("html").getAttribute('lang').toUpperCase()||'EN';class DateFormatter{constructor(day,month,year){this.day=day;this.month=month;this.year=year;}
getMonthName(){const monthNames={"ES":['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre',],"RO":["Ianuarie","Februarie","Martie","Aprilie","Mai","Iunie","Iulie","August","Septembrie","Octombrie","Noiembrie","Decembrie"],"EN":['January','February','March','April','May','June','July','August','September','October','November','December',],"PT":['janeiro','fevereiro','março','abril','maio','junho','julho','agosto','setembro','outubro','novembro','dezembro',],"IT":['gennaio','febbraio','marzo','aprile','maggio','giugno','luglio','agosto','settembre','ottobre','novembre','dicembre',]};return monthNames[lang][this.month]}
getDateObj(){return new Date(this.year,this.month,this.day)}
getMonthNumber(){let month=this.month+1
return month>9?''+month:'0'+month}
getYear(){return this.year}
getDayNumber(){return this.day>9?''+this.day:'0'+this.day}
getDayName(){const daysArr={'RO':['Duminica','luni','marti','miercuri','joi','vineri','sambata'],'EN':['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],'ES':['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],'IT':['Domenica','Lunedì','Martedì','Mercoledì','Giovedì','Venerdì','Sabato']};const date=this.getDateObj();const dayIndex=date.getDay();return daysArr[lang][dayIndex];}}
class CalculateDate{constructor(el){this.element=el}
getDate(){let date=""
let dataset=this.element.dataset;let dateFunctions={"day":{"set":(date,value)=>date.setDate(value),"get":(date)=>date.getDate(),},"month":{"set":(date,value)=>date.setMonth(value),"get":(date)=>date.getMonth()},"year":{"set":(date,value)=>date.setFullYear(value),"get":(date)=>date.getFullYear()}}
let resultDate=new Date()
if(dataset){date=dataset.date;}
if(date){let settings=date.split(',')
for(let i=0;i<settings.length;i++){let setting=settings[i].trim();let[setting_name,setting_value]=setting.split(':')
setting_name=setting_name.trim()
setting_value=setting_value.trim()
let functions=dateFunctions[setting_name]
if(!functions){console.log(`Not found: ${setting_name}`);return}
if(setting_value.startsWith("+")){setting_value=parseInt(setting_value.replace("+",""))
functions.set(resultDate,functions.get(resultDate)+setting_value)}
else if(setting_value.startsWith("-")){setting_value=parseInt(setting_value.replace("-",""))
functions.set(resultDate,functions.get(resultDate)-setting_value)}
else{setting_value=parseInt(setting_value)
functions.set(resultDate,setting_value)}}
return resultDate}
return resultDate}}
document.querySelectorAll('.date').forEach(el=>{let elDate=new CalculateDate(el).getDate();let dateFormatter=new DateFormatter(elDate.getDate(),elDate.getMonth(),elDate.getFullYear())
function parseDateString(dateString){dateString=`${dateString.replace("dd", dateFormatter.getDayNumber())}`
dateString=`${dateString.replace("wd", dateFormatter.getDayName())}`
dateString=`${dateString.replace("mn[3]", dateFormatter.getMonthName().slice(0, 3))}`
dateString=`${dateString.replace("mn", dateFormatter.getMonthName())}`
dateString=`${dateString.replace("mm", dateFormatter.getMonthNumber())}`
dateString=`${dateString.replace("yy", dateFormatter.getYear())}`
dateString=`${dateString.replace("yyyy", dateFormatter.getYear())}`
dateString=`${dateString.replace("dn", dateFormatter.getDayName())}`
return dateString}
let dataset=el.dataset;let format
if(dataset){format=parseDateString(dataset.format)}
console.log(format);el.innerHTML=format})
function setValueToElements(selector,value){document.querySelectorAll(selector).forEach((el)=>{el.innerHTML=value;})}
let todayDate=new Date()
let todayFormatter=new DateFormatter(todayDate.getDate(),todayDate.getMonth(),todayDate.getFullYear())
setValueToElements('.monthName',todayFormatter.getMonthName())
setValueToElements('.dayName',todayFormatter.getDayName())
setValueToElements('.day',todayFormatter.getDayNumber())
setValueToElements('.year',todayFormatter.getYear())