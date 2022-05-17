from .models import Registro
from rest_framework import serializers


class RegistroSerializer(serializers.HyperlinkedModelSerializer):
    class Meta:
        model = Registro
        fields = ['url', 'date', 'time', 'concept', 'user']
