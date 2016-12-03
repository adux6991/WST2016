from __future__ import unicode_literals
from django.db import models

class Guest(models.Model):
	name = models.CharField(max_length = 100)
	age = models.CharField(max_length = 10)
	gender = models.CharField(max_length = 10)
	email = models.CharField(max_length = 100)

	def __str__(self):
		return self.name
