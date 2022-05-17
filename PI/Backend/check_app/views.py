from rest_framework import viewsets
from rest_framework import permissions
from .serializer import RegistroSerializer
from .models import Registro


class RegistroViewSet(viewsets.ModelViewSet):
    queryset = Registro.objects.all().order_by('-created')
    serializer_class = RegistroSerializer
    permission_classes = [permissions.IsAuthenticated]