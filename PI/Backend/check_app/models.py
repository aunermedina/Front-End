from django.db import models
from django.contrib.auth.models import User


class Registro(models.Model):
    created = models.DateTimeField(auto_now_add=True)
    user = models.ForeignKey(User, on_delete=models.CASCADE)
    date = models.DateField(auto_now_add=True)
    time = models.TimeField(auto_now_add=True)
    concept = models.CharField(max_length=50)

    class Meta:
        ordering = ['created']
