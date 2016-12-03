from django.shortcuts import render
from django.http import HttpResponse
from .models import Guest

def main(request):
	return render(request, 'polls/main.html')

def register(request):
	if request.method == 'POST':
		Guest.objects.create(name = request.POST['name'], age = request.POST['age'], gender = request.POST['gender'], email = request.POST['email'])
		return render(request, 'polls/register.html')
	else:
		return HttpResponse("FAILED")

def query(request):
	guestList = Guest.objects.all()
	return render(request, 'polls/query.html', {'guestList':guestList})

def delete(request):
	#result = request.POST.keys()
	#return HttpResponse(' '.join(result))

	guestList = Guest.objects.all()
	guestID = [guest.id for guest in guestList]
	for ID in guestID:
		if str(ID) in request.POST:
			Guest.objects.filter(id = ID).delete()
	return render(request, 'polls/delete.html')

def index(request):
	return HttpResponse("Hello, World! This is index.")
