#include<stdio.h>
void main()
{
	float p,temp,sum,x[10],y[10][10];
	int i,j,k=0,n,f;
	printf("\nHow many points will be given : ");
	scanf("%d",&n);
	for(i=0;i<n;i++)
	{
		printf("\nEnter the values of x%d : ",i);
		scanf("%f",&x[i]);
		printf("\nEnter the values of f(x%d) : ",i);
		scanf("%f",&y[k][i]);
	}
	for(i=1;i<n;i++)
	{
		k=i;
		for(j=0;j<(n-i);j++)
		{
		y[i][j]=(y[i-1][j+1]-y[i-1][j])/(x[k]-x[j]);
		k++;
		}
	}
	printf("\n_____________________________________________________\n");
	printf("\n  x(i)\t   y(i)\t    y1(i)    y2(i)    y3(i)    y4(i)");
	printf("\n_____________________________________________________\n");
	for(i=0;i<n;i++)
	{
		printf("%.3f",x[i]);
		for(j=0;j<(n-i);j++)
		{
			printf("    ");
			printf("%.3f",y[j][i]);
		}
		printf("\n");
	}
	printf("\nEnter the value of 'k' in f(k) you want to evaluate : ");
	scanf("%f", &p);
	i=0;
	do
	{
		if(x[i]<p && p<x[i+1])
		k=1;
		else
		i++;
	}
	while(k!=1);
	f=i;
	sum=0.0;
	for(i=0;i<(n-1);i++)
	{
		k=f;
		temp=1;
		for(j=0;j<i;j++)
		{
			temp*=(p-x[k]);
			k++;
		}
		sum+=temp*y[i][f];
	}
	printf("\nf(%.2f) = %.3f\n\n", p , sum);
}
